<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Guest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $guests = Guest::orderBy('created_at', 'desc')->get();
        $galleries = Gallery::all();
        return view('admin', compact('settings', 'guests', 'galleries'));
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        if (!$settings) {
            $settings = new Setting();
        }

        $request->validate([
            'cover_image' => 'nullable|image|max:5120',
            'desktop_bg_image' => 'nullable|image|max:5120',
            'bg_video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            'bg_music' => 'nullable|mimes:mp3,wav,ogg,m4a|max:10240',
            'groom_image' => 'nullable|image|max:5120',
            'bride_image' => 'nullable|image|max:5120',
            'groom_name' => 'nullable|string|max:255',
            'bride_name' => 'nullable|string|max:255',
            'groom_fullname' => 'nullable|string|max:255',
            'bride_fullname' => 'nullable|string|max:255',
            'groom_ig' => 'nullable|string|max:255',
            'bride_ig' => 'nullable|string|max:255',
            'groom_parents' => 'nullable|string|max:255',
            'bride_parents' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|string|max:255',
            'akad_date' => 'nullable|string|max:255',
            'akad_time' => 'nullable|string|max:255',
            'resepsi_date' => 'nullable|string|max:255',
            'resepsi_time' => 'nullable|string|max:255',
            'resepsi_location' => 'nullable|string',
            'location_link' => 'nullable|string',
            'bank_name' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:255',
            'bank_account_name' => 'nullable|string|max:255',
            'bank_name_2' => 'nullable|string|max:255',
            'bank_account_2' => 'nullable|string|max:255',
            'bank_account_name_2' => 'nullable|string|max:255',
            'youtube_link' => 'nullable|string|max:500',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $fields = ['cover_image', 'desktop_bg_image', 'bg_video', 'bg_music', 'groom_image', 'bride_image'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($settings->$field && !str_starts_with($settings->$field, 'http')) {
                    if (file_exists(public_path($settings->$field))) {
                        unlink(public_path($settings->$field));
                    }
                }

                // Store new file directly in public folder to avoid symlink issues
                $file = $request->file($field);
                $filename = $field . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/media'), $filename);
                
                // Save the path to database
                $settings->$field = 'uploads/media/' . $filename;
            }
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/gallery'), $filename);
                Gallery::create([
                    'image_path' => 'uploads/gallery/' . $filename
                ]);
            }
        }

        // Save text fields
        $textFields = [
            'groom_name', 'bride_name', 'groom_fullname', 'bride_fullname',
            'groom_ig', 'bride_ig', 'groom_parents', 'bride_parents', 'wedding_date', 'akad_date',
            'akad_time', 'resepsi_date', 'resepsi_time', 'resepsi_location', 'location_link',
            'bank_name', 'bank_account', 'bank_account_name',
            'bank_name_2', 'bank_account_2', 'bank_account_name_2',
            'youtube_link'
        ];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                $settings->$field = $request->input($field);
            }
        }

        $settings->save();

        return redirect()->route('admin.index')->with('success', 'Pengaturan berhasil disimpan!');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        if (file_exists(public_path($gallery->image_path))) {
            unlink(public_path($gallery->image_path));
        }
        $gallery->delete();
        return back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}

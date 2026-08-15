<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        // Get recipient name from query parameter ?to=Name
        $recipient = $request->query('to', 'Tamu Undangan');
        
        // Replace '+' or '_' with spaces if any (though Laravel query string handles + as space automatically)
        // But for safety
        $recipient = str_replace(['+', '_'], ' ', $recipient);

        // Fetch all wishes (guests who left a message), ordered by newest
        $wishes = Guest::whereNotNull('message')->orderBy('created_at', 'desc')->get();

        // Fetch settings
        $settings = \App\Models\Setting::first();
        
        // Fetch galleries
        $galleries = \App\Models\Gallery::all();

        return view('invitation', compact('recipient', 'wishes', 'settings', 'galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:hadir,tidak_hadir,ragu',
            'message' => 'nullable|string',
        ]);

        Guest::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih atas doa dan konfirmasi kehadiran Anda.'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
            'cover_image' => 'https://hi.rumahundangan.in/wp-content/uploads/2025/11/VINTAGE-06.webp',
            'bg_video' => 'https://inv.rumahundangan.in/wp-content/uploads/2025/10/PREMIUM-VINTAGE-10.mp4',
            'groom_image' => 'https://hi.rumahundangan.in/wp-content/uploads/2025/08/VINTAGE-54.webp',
            'bride_image' => 'https://hi.rumahundangan.in/wp-content/uploads/2025/08/VINTAGE-32.webp',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Portfolio',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            ]
        );

        // Seed Skills
        $skills = [
            // Category: Progress (Keahlian & Kompetensi)
            ['name' => 'HTML5 & CSS3', 'percentage' => 95, 'category' => 'progress', 'icon' => null],
            ['name' => 'JavaScript (ES6+)', 'percentage' => 40, 'category' => 'progress', 'icon' => null],
            ['name' => 'Bootstrap & Tailwind', 'percentage' => 70, 'category' => 'progress', 'icon' => null],
            ['name' => 'Figma (UI Design)', 'percentage' => 90, 'category' => 'progress', 'icon' => null],
            
            // Category: Stack (Tech Stack & Tools)
            ['name' => 'PHP', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-php-plain colored'],
            ['name' => 'Firebase', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-firebase-plain colored'],
            ['name' => 'Supabase', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-supabase-plain colored'],
            ['name' => 'Flutter', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-flutter-plain colored'],
            ['name' => 'HTML5', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-html5-plain colored'],
            ['name' => 'CSS3', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-css3-plain colored'],
            ['name' => 'JS', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-javascript-plain colored'],
            ['name' => 'GitHub', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-github-original'],
            ['name' => 'Figma', 'percentage' => null, 'category' => 'stack', 'icon' => 'devicon-figma-plain colored'],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }
    }
}

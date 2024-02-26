<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Listing::create([
            'title' => 'Full-Stack Laravel Developer',
            'tags' => 'Laravel, Vue.js, PHP',
            'company' => 'nde Industries',
            'location' => 'Hartford, CT',
            'email' => 'nde@test.com',
            'website' => 'https://www.nde.com',
            'description' => 'We are looking for a Laravel Developer to join our team.',
        ]);
        Listing::create([
            'title' => 'Front-End React Developer',
            'tags' => 'React, Typescript',
            'company' => 'nde Incorperated',
            'location' => 'Manchester, CT',
            'email' => 'nde95@example.com',
            'website' => 'https://www.nde.io',
            'description' => 'We are looking for a React Developer to join our team.',
        ]);
        Listing::create([
            'title' => 'PHP Developer',
            'tags' => 'PHP, Laravel',
            'company' => 'nde Enterprises',
            'location' => 'Norwich, CT',
            'email' => 'nde95@testing.com',
            'website' => 'https://www.nde.net',
            'description' => 'We are looking for a PHP Developer to join our team.',
        ]);
    }
}

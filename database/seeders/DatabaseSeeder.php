<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Nde95',
            'email' => 'nde95@admin.com',
        ]);

        Listing::create([
            'title' => 'Full-Stack Laravel Developer',
            'user_id' => $user->id,
            'tags' => 'Laravel, Vue.js, PHP',
            'company' => 'nde Industries',
            'location' => 'Hartford, CT',
            'email' => 'nde@test.com',
            'website' => 'https://www.nde.com',
            'description' => 'We are looking for a Laravel Developer to join our team.',
        ]);
        Listing::create([
            'title' => 'Front-End React Developer',
            'user_id' => $user->id,
            'tags' => 'React, Typescript',
            'company' => 'nde Incorperated',
            'location' => 'Manchester, CT',
            'email' => 'nde95@example.com',
            'website' => 'https://www.nde.io',
            'description' => 'We are looking for a React Developer to join our team.',
        ]);
        Listing::create([
            'title' => 'PHP Developer',
            'user_id' => $user->id,
            'tags' => 'PHP, Laravel',
            'company' => 'nde Enterprises',
            'location' => 'Norwich, CT',
            'email' => 'nde95@testing.com',
            'website' => 'https://www.nde.net',
            'description' => 'We are looking for a PHP Developer to join our team.',
        ]);
    }
}

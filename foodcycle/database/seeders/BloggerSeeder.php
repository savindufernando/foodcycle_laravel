<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogger;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blogger::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'), // Always hash passwords
        ]);
    }
}

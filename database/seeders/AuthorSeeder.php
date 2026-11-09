<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Althea Amparo',
            'position' => 'Kagawad',
            'email' => 'kagawad.amparo@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}

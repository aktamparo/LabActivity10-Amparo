<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('email', 'kagawad.amparo@bulletin.test')->firstOrFail();

        Post::factory()->count(40)
            ->sequence(fn () => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn () => ['author_id' => $authors->random()->id])
            ->create();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Amparo Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join our community clean-up drive and help keep Purok Amparo safe and clean.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-01-01',
            'views' => 0,
        ]);
    }
}

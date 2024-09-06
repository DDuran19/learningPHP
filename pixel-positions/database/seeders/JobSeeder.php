<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();
        Job::factory(10)->create()->each(function ($job) use ($tags) {
            $randomTags = $tags->random(3);
            $job->tags()->attach($randomTags);
            $job->featured = fake()->boolean(50);
        });
    }
}

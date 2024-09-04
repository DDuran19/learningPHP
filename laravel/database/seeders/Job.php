<?php

namespace Database\Seeders;

use Database\Factories\JobFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Job extends Seeder
{
    protected $table = 'job_listings';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobFactory::factory(10)->create();
    }
}

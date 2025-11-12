<?php

namespace Database\Seeders;

use App\Models\ProjectTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectTask::factory() -> count(10) -> create();
    }
}

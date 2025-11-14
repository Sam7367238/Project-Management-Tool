<?php

namespace App\Jobs;

use App\Models\Project;
use App\Notifications\ProjectFinished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FinishDate implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $projects = Project::where("is_finished", false) -> whereDate("finish_date", now()) -> get();

        foreach ($projects as $project) {
            $project -> update(["is_finished" => true]);
            $project -> user -> notify(new ProjectFinished($project));
        }
    }
}

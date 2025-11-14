<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    protected $fillable = ["name", "description", "is_finished", "finish_date"];

    protected function casts(): array {
        return [
            "finish_date" => "date"
        ];
    }

    public function user(): BelongsTo {
        return $this -> belongsTo(User::class);
    }

    public function tasks() {
        return $this -> hasMany(ProjectTask::class);
    }
}

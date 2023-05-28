<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Repetitions extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_id'];

    public function exercises(): BelongsTo
    {
        return $this->belongsTo(Exercises::class);
    }

    public function routines(): BelongsToMany
    {
        return $this->belongsToMany(Routines::class, 'repetitions_routines', 'repetitions_id', 'routines_id');
    }
}

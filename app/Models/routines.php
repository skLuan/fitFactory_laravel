<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Routines extends Model
{
    use HasFactory;

    public function repetitions(): BelongsToMany
    {
        return $this->belongsToMany(Repetitions::class, 'repetitions_routines', 'routines_id', 'repetitions_id');
    }
    public function wods(): BelongsToMany
    {
        return $this->belongsToMany(Wods::class, 'routines_wod', 'routine_id', 'wod_id');
    }


    public function trainingType(): BelongsTo
    {
        return $this->belongsTo(TrainingType::class);
    }
}

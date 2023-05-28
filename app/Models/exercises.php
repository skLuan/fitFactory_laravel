<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercises extends Model
{
    use HasFactory;

    public function repetitions(): HasMany
    {
        return $this->hasMany(Repetitions::class);
    }
    public function routines(): HasMany
    {
        return $this->hasMany(Routines::class);
    }
}

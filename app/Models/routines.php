<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Routines extends Model
{
    use HasFactory;

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercises::class);
    }
}

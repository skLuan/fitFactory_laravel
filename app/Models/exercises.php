<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercises extends Model
{
    use HasFactory;

    public function routines(): BelongsToMany
    {
        return $this->belongsToMany(Routines::class);
    }
}

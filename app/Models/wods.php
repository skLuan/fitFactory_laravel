<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wods extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'time'];

    public function userTimes(): HasMany
    {
        return $this->hasMany(UserTimes::class);
    }

    public function routines(): BelongsToMany
    {
        return $this->belongsToMany(Routines::class, 'routines_wod', 'wod_id', 'routine_id');

    }
}

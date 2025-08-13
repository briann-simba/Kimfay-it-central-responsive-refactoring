<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    /** @use HasFactory<\Database\Factories\DivisionFactory> */
    use HasFactory;
    // One division can belong to many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

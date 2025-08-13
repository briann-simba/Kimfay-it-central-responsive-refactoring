<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    /** @use HasFactory<\Database\Factories\DesignationFactory> */
    use HasFactory;
    // One designation can belong to many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

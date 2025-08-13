<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    //
     use HasFactory;
//one department has one head of department
    public function hod(): BelongsTo
    {
        return $this->belongsTo(User::class, 'hod_id', 'id');
    }

    // One department has many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'dep_id');
    }
   
}

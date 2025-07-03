<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    //
     use HasFactory;
//one department has many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'dep_id', 'id');
    }
}

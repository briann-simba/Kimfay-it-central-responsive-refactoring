<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    //
     use HasFactory;
//one department has one head of department
    public function hod(): BelongsTo
    {
        return $this->belongsTo(User::class, 'hod_id', 'id');
    }
   
}

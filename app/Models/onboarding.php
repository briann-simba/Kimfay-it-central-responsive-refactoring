<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboarding extends Model
{
    /** @use HasFactory<\Database\Factories\OnboardingFactory> */
    use HasFactory;


    protected $fillable = [
        'user_id',
        'email',
        'status',
        'progress',
        'completed',
        'completed_at',
    ];
}

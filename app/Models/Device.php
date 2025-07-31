<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\AssignDeviceLog;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
  protected $fillable = [
        'user_id',
        'name',
        'color',
        'category',
        'value',
        'line_manager_approval',
        'user_accepted',
    ];

    //this device belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function assignDeviceLogs(): HasMany
    {
        return $this->hasMany(AssignDeviceLog::class);
    }
}

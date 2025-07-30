<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Device;

class AssignDeviceLog extends Model
{
    /** @use HasFactory<\Database\Factories\AssignDeviceLogFactory> */
    use HasFactory;

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}

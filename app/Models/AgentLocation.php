<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_agent_id',
        'external_agent_id',
        'latitude',
        'longitude',
        'tracked_at',
    ];

    protected $casts = [
        'tracked_at' => 'datetime',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function internalAgent()
    {
        return $this->belongsTo(InternalAgent::class);
    }

    public function externalAgent()
    {
        return $this->belongsTo(ExternalAgent::class);
    }
}

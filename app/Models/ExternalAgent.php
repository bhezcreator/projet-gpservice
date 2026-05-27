<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'full_name',
        'speciality',
        'email',
        'phone',
        'hourly_rate',
        'is_available'
    ];

    public function missions()
    {
        return $this->belongsToMany(Mission::class);
    }

    public function locations()
    {
        return $this->hasMany(AgentLocation::class);
    }
}

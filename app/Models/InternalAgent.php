<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_number',
        'department',
        'position',
        'hire_date',
        'salary',
        'is_available'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class);
    }

    public function locations()
    {
        return $this->hasMany(AgentLocation::class);
    }
}

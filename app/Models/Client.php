<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'contact',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'type',
        'is_active'
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}

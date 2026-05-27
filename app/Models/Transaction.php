<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'type',
        'label',
        'amount',
        'transaction_date',
        'description',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

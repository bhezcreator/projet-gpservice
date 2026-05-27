<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'invoice_number',
        'amount',
        'status',
        'due_date',
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
        ];
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function payments()
    {
        return $this->hasMany(Transaction::class);
    }
}

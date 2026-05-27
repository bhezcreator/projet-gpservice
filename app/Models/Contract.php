<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'contract_number',
        'start_date',
        'end_date',
        'amount',
        'status',
        'file'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

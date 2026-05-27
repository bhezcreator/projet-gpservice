<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'reference',
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'budget',
        'location',
        'priority',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function internalAgents()
    {
        return $this->belongsToMany(InternalAgent::class);
    }

    public function externalAgents()
    {
        return $this->belongsToMany(ExternalAgent::class);
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technician extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'state',
        'city',
        'address',
        'complement',
        'fone',
        'email',
        'distance',
        'ssn',
        'dmv',
        'state_id',
        'description',
        'image',
        'latitude',
        'longitude'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function clicks()
    {
        return $this->hasMany(TechnicianClick::class);
    }
}

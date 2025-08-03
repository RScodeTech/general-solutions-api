<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianClick extends Model
{
    protected $fillable = ['technician_id', 'ip', 'user_agent'];

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }
}

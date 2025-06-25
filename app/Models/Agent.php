<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'agency_id', 'photo', 'bio'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'description', 'address', 'email', 'phone'];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}

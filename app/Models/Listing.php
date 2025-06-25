<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'status', 'address', 'agent_id', 'agency_id', 'user_id'
    ];

    public function propertyDetail()
    {
        return $this->hasOne(PropertyDetail::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}

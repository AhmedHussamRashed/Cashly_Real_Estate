<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'area', 'rooms', 'bathrooms', 'floor', 'description', 'type'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}

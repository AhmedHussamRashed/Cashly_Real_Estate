<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'balance',
        'photo',
        'birthdate',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
    ];

    // تحديد صلاحيات الدور
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // علاقات المستخدم
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // علاقات إضافية حسب الدور
    public function properties()
    {
        return $this->hasMany(Property::class, 'agent_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

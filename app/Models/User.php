<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users'; // Optional if table is named "users"
    protected $fillable = ['name', 'email', 'password', 'profile_picture', 'bio'];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
    
}


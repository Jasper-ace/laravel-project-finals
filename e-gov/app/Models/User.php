<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'users';
    // Replace 'mysql' with your database connection name

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Get the name of the password attribute for the user.
     * @return string
     */
    public function getAuthPasswordName() {
        return 'password'; // Replace 'password' with the actual name of your password column

    }
}

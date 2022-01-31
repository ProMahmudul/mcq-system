<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// sanctum
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'email',
        'name',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function quiz()
    {
        $this->hasMany(Quiz::class);
    }

    public function result()
    {
        $this->hasMany(Result::class);
    }

    public function role()
    {
        $this->hasOne(UserRole::class);
    }
}

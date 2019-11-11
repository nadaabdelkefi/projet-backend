<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';

    protected $fillable = ['name', 'password', 'email'];

    protected $primaryKey = 'user_id';
}

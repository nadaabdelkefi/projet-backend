<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'Admin';

    protected $fillable = ['name', 'password', 'email'];

    protected $primaryKey = 'admin_id';
}

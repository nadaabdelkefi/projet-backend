<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';

    protected $fillable = ['id','user_name', 'password','email'];

    public function produit(){
        return $this->belongsToMany(Produit::class);
    }
    
}
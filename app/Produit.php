<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    
    protected $table = 'Produit';
    protected $fillable = ['titre', 'prix','quantite'];
    protected $primaryKey = 'produit_id';
    public $timestamps = false;

    public function user(){
        return $this->belongsToMany(User::class);
    }
}

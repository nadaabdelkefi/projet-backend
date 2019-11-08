<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    protected $table = 'Achat';
    protected $fillable = ['achat_id', 'user_id','produit_id','quantite'];
    protected $primaryKey = 'produit_id';
    public $timestamps = false;
}

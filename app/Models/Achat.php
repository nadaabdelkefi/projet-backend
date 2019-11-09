<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    protected $table = 'Achat';
    protected $fillable = ['user_id','produit_id','quantite'];
    protected $primaryKey = 'achat_id';
    public $timestamps = false;
}

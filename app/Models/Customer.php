<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoice(){
        return $this->hasMany(Invoice::class,'cat_id');
    }
    public function commande(){
        return $this->hasMany(Commande::class,'cat_id');
    }
}

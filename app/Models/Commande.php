<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Commande extends Model
{
    use HasFactory;

   
    public function customer(){
        return $this->belongsTo(Customer::class,'cust_id');
    }
    public function sale(): HasMany {
        return $this->hasMany(Sale::class);
    }
}






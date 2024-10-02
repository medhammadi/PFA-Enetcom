<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contient1 extends Model
{
    use HasFactory;
    protected $fillable = [
        //'Commande_Code',
     //   'product_code',
        'Qte_Commander'
    ];
}

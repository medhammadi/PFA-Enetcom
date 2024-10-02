<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contient2 extends Model
{
    use HasFactory;
    protected $fillable = [
       // 'product_code',
     //   'Facture_Code',
        'Qte_délivré'
    ];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'client_code',
        'nom_c',
        'prenom_c',
        'adr_c',
        'email_c',
        'num_tel',
        'categorie_id'
    ];

     public function commandes(): HasMany {
          return $this->hasMany(Commande::class);
      }
    //   public function invoice(){
    //     return $this->hasMany(Invoice::class);
    // }
}
//              $2y$12$/VBer11y/UCqg0Ot7WOCcerJgT1wr8w.73Cm94dv6UVP/i/XkqyWy
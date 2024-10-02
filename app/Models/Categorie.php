<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Categorie extends Model
{
    use HasFactory;
   
 
    protected $fillable = [
        'libelle',
        'categorie_code',
        'description'
    ];


    public function produits(): HasMany {
        return $this->hasMany(Product::class);
    }
}
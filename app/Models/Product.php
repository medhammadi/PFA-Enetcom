<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 
 
class Product extends Model
{
    use HasFactory;
    
 
   protected $fillable = [
        'title',
        'price',
        'product_code',
     //   'categorie_code',
        'description',
        'tax_id',
        'categorie_id'

    ];

public function tax(){
        return $this->belongsTo(Tax::class);
}
  public function categorie(): BelongsTo {
         return $this->belongsTo(Categorie::class);
     }  
 public function sales(): HasMany {
        return $this->hasMany(Sale::class);
    }
}
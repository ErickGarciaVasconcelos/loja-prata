<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // 1. Libera quais colunas podem ser salvas no banco
    protected $fillable = [
        'sku', 
        'name', 
        'description', 
        'plating_details', 
        'price', 
        'is_active'
    ];

    // 2. Cria a relação: Um produto TEM MUITAS (hasMany) imagens
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
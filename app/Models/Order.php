<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'total_amount', 
        'status', 
        'tracking_code'
    ];

    // Um pedido PERTENCE A um usuário (cliente)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

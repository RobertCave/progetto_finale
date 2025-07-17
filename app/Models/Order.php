<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];


public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function orderProducts(): HasMany
{
    return $this->hasMany(order_product::class);
}

// Una funzione per ottenere i prodotti dell'ordine con i libri associati
// altrimenti non riuscivo a visualizzare i libri associati agli ordini
// nella pagina di successo dell'ordine
public function orderProductsWithBooks(): HasMany
{
    return $this->hasMany(order_product::class)->with('book');
}

}

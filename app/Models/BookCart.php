<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCart extends Model
{
    use HasFactory;
    protected $fillable=[
        'cart_id',
        'book_id',
    ];

    /**
     * The roles that belong to the BookCart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function book_cart(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'books', 'book_id', 'cart_id');
    }

    
}

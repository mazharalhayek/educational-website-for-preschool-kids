<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'total',
    ];

    /**
     * Get the user that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_cart()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    /**
     * Get the books that belongs to the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cart_books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'book_carts','cart_id','book_id');
    }
}

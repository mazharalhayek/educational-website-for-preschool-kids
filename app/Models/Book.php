<?php

namespace App\Models;

use App\Models\Parents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'author',
        'description',
        'price',
        'Cover',
        'PDF',
        'rating'
    ];

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_books','book_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentBook extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'book_id',
      'parent_id',
    ];


    public function book(): BelongsToMany
    {
        return $this->belongsToMany(Parent::class, 'books', 'book_id', 'parent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ParentBook extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'book_id',
      'parent_id',
    ];


    public function parents()
    {
        return $this->belongsToMany(Parent::class, 'parent_books');
    }
    public function books()
    {
      return $this->belongsToMany(Book::class,'parent_books');
    }
}

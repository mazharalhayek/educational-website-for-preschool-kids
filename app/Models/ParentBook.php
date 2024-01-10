<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Parents;

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
        return $this->belongsToMany(Parents::class, 'parent_books','parent_id','id');
    }

    // /**
    //  * The roles that belong to the ParentBook
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    // }

    public function books()
    {
      return $this->belongsToMany(Book::class,'parent_books');
    }
}

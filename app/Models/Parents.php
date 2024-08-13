<?php

namespace App\Models;


use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parents extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'id',
            'name',
            'email',
            'password',
            'birth_date',
            'image',
        ];


    public function mychidlren()
    {
        return $this->hasMany(Children::class,'parent_id','id')->with('my_tutors');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'parent_books','parent_id','book_id');
    }
}

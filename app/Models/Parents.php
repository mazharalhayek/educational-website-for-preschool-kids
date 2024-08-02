<?php

namespace App\Models;


use App\Models\Book;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



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
        return $this->hasMany(Children::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'parent_books','parent_id','book_id');
    }
}

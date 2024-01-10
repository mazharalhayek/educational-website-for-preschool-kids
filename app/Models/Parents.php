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
        ];


    public function mychidlren()
    {
        return $this->hasMany(Children::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'parent_books','parent_id','book_id');
    }


    /**
     * The roles that belong to the Parents
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    }
}

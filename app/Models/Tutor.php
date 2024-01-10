<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Laravel\Sanctum\HasApiTokens;



class Tutor extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'name',
        'email',
        'password',
        'birth_date',
        'salary',
        'qualifications',
        'subject',
    ];


    public function tutor_image()
    {
        return $this->hasOne(Image::class, 'object_id', 'id');
    }


    public function my_students()
    {
        return $this->belongsToMany(Children::class, 'tutor_children', 'tutor_id', 'child_id');
    }
}

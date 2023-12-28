<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;



class Tutor extends Model
{
    

    protected $fillable =
    [
        'name',
        'email',
        'password',
        'birth_date',
    ];

    use HasFactory;
}
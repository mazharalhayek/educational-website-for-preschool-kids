<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $fillable = 
    [
        'name',
        'email',
        'password',
        'phone_num',
        'birth_date',
        'card_type',
    ];


    public function mychidlren()
    {
        return $this->hasMany(Children::class);
    }

    use HasFactory;
}

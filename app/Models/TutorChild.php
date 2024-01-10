<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Children;

class TutorChild extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'tutor_id',
        'child_id',
    ];


    public function teached_by()
    {
        return $this->hasMany(Children::class,'id','id');
    }

    public function teaches()
    {
        return $this->hasMany(Tutor::class, 'id', 'id');
    }
}

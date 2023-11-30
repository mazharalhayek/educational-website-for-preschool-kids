<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable =
    [
        'name',
        'age',
        'parent_id',
        'password',
    ];


public function my_parent()
{
    return $this->belongsTo(Parents::class, 'parent_id', 'id');
}


    use HasFactory;
}

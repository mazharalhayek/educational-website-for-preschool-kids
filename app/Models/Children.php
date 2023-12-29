<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'age',
        'parent_id',
        'password',
        'image',
    ];


    public function my_parent()
    {
        return $this->belongsTo(Parents::class, 'parent_id', 'id');
    }

}

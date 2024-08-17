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


    public function my_tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_children', 'child_id', 'tutor_id')
            ->with('reviews');
    }


    public function my_progress()
    {
        return $this->hasMany(Progress::class, 'child_id', 'id');
    }

    public function receivedMedia()
    {
        return $this->hasMany(Media::class, 'student_id', 'id');
    }
}

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
            'image'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function my_students()
    {
        return $this->belongsToMany(Children::class, 'tutor_children', 'tutor_id', 'child_id')->with('my_parent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(TutorChild::class, 'tutor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMedia()
    {
        return $this->hasMany(Media::class, 'tutor_id', 'id');
    }
}

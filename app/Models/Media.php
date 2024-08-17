<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
        'title',
        'file',
        'state',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mediaSender()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'id');
    }

    public function mediaReceiver()
    {
        return $this->belongsTo(Children::class, 'student_id', 'id');
    }
}

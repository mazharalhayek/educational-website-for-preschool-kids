<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 
        'responder_id',
        'type',
        'content' ];

    public function service()
    {
        return $this->hasMany(User::class, 'id', 'sender_id');
    }

}

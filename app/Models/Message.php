<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'senderId',
        'receiverId',
        'content',
        'childId',
        'isReported'
    ];

    public static function getReportedMessages()
    {
        $reported = Message::where('isReported', true)->with('sender', 'reciever')
            ->paginate(5);
        return $reported;
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'senderId', 'id')->with('user_type');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'receiverId', 'id')->with('user_type');
    }

}

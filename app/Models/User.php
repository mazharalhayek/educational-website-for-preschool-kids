<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'email',
        'password',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $append = [
        'allMyMessages',
    ];

    public function user_type($id=null,$type=null)
    {
        if($id != null){
            switch($type){
                case 'parent':
                    return Parents::where('id',$id)->first();
                case 'tutor':
                    return Tutor::where('id',$id)->first();                
            }
        }
        switch(Auth::user()->type){
            case 'parent':
                return $this->hasOne(Parents::class, 'id')->with('books','mychidlren');
            case 'tutor':
                return $this->hasOne(Tutor::class, 'id')->with('my_students');
            case 'admin':
                return $this->hasOne(Admin::class, 'id');
        }
    }

    /**
     * Get the cart associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id')->with('cart_books','booksInCart');
    }

    
    public function allMyMessages($id)
    {
        $sentmessages = Message::where('senderId', $this->id)
        ->Where('receiverId', $id)
        ->get()->toArray();
        $receivedmessages = Message::where('senderId', $id)
        ->Where('receiverId', $this->id)
        ->get()->toArray();
        $allmessages = array_merge($sentmessages,$receivedmessages);

        usort($allmessages, function ($a, $b) {
            return $a['created_at'] <=> $b['created_at']; 
        });
        return $allmessages;
    }
}

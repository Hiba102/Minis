<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mini;
use App\Models\Conversation;
use App\Models\Follower;
use App\Models\User;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function minis() {
        return $this->hasMany(Mini::class);
    }

    public function conversations_sent() {
        return $this->hasMany(Conversation::class,'sender_id');
    }

    public function conversations_received() {
        return $this->hasMany(Conversation::class,'recipient_id');
    }

    public function following() {
        return $this->belongsToMany(User::class,'followers','follower_id','followed_id');
    }

    public function followed_by() {
        return $this->belongsToMany(User::class,'followers','followed_id','follower_id');
    }

 
    public function following_minis() {
        return Mini::join('followers','minis.user_id','=','followers.followed_id')
                    ->select('minis.id','minis.user_id','minis.body','minis.updated_at')
                     ->where('followers.follower_id',Auth::id())
                     ->orderBy('minis.created_at','desc')
                     ->get();
                     
    }


    public function usernames_list() {
             $q1= User::join('conversations','conversations.sender_id','=','users.id')
           ->Where('conversations.recipient_id',Auth::id())
           ->select('users.id','users.username','users.profile_photo_path',DB::raw('MIN(conversations.is_opened) as is_opened'),DB::raw('MAX(conversations.created_at) as last_message_date'))
           ->groupBy('users.username','users.id','users.profile_photo_path');
           $names=$q1->get()->map(function($item){
            return $item['username'];
        });

        $q2= User::join('conversations','conversations.recipient_id','=','users.id')
        ->Where('conversations.sender_id',Auth::id())
        ->whereNotIn('users.username',$names)
        ->select('users.id','users.username','users.profile_photo_path',DB::raw('1 as is_opened'),DB::raw('MAX(conversations.created_at) as last_message_date'))
        ->groupBy('users.username','users.id','users.profile_photo_path')
        ->union($q1)
        ->orderBy('is_opened','ASC')
        ->orderBy('last_message_date','DESC')
        ->get();


      return $q2;


    }

    public function mark_conversation_as_opened(User $user) {
        Conversation::where([
            ['sender_id',$user->id],
            ['recipient_id',Auth::id()]
        ])->update(['is_opened'=>true]);

    }



    public function get_conversation($other_user) {
      
        return Conversation::where([['sender_id',Auth::id()],['recipient_id',$other_user->id]])
                        ->orWhere([['sender_id',$other_user->id],['recipient_id',Auth::id()]])
                        ->get();
    }



    public function follow($user) {
        if (!Auth::user()->is_following($user->id)) {
        $record=new Follower();
        $record->follower_id=Auth::id();
        $record->followed_id=$user->id;
        $record->save();
        }

    }

    public function unfollow($user) { 
        if (Auth::user()->is_following($user->id)) {
        $record=Follower::where([
            ['followed_id',$user->id],
            ['follower_id',Auth::id()]
        ]);
        $record->delete();
    }
               
    }

    public function is_following($user_id) {
        $record=Follower::where([
           [ 'follower_id',Auth::id()],
           ['followed_id',$user_id]
        ])->first();
        if ($record) {
            return true;
        }
        return false;
    }

    public function has_new_messages() 
    {
        return Auth::user()->conversations_received()->where('is_opened',false)->count()>0;
    }
}

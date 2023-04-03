<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable=['body','sender_id','recipient_id'];

    public function sender() {
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function recipient() {
        return $this->belongsTo(User::class,'recipient_id','id');
    }

 

}

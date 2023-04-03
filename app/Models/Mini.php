<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


use Illuminate\Support\Facades\Auth;


class Mini extends Model
{
    use HasFactory;

    protected $fillable=['body','user_id'];


    public function author() {
        return $this->belongsTo(User::class,'user_id','id');
    }

}

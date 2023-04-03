<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Conversation;

use App\Http\Requests\ConversationRequest;

class ConversationController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
  
        return view('conversations.index',['usernames_list'=>Auth::user()->usernames_list()]);

    }

    public function create(User $user) {
        return view('conversations.create',['recipient'=>$user]);

    }

    public function store(ConversationRequest $request, User $user) {
        $data=$request->validated();
        $data['sender_id']=Auth::id();
        $data['recipient_id']=$user->id;
        
        Conversation::create($data);
        return redirect()->route('conversations.show',$user)->with('success','Your message is sent.');
        
    }

    public function show(User $user) {
     Auth::user()->mark_conversation_as_opened($user);   
       return view('conversations.show',['conversation'=>Auth::user()->get_conversation($user),'other_user'=>$user]);

    }


    public function destroy(User $user) {
        Conversation::where([['sender_id','=',Auth::id()],['recipient_id','=',$user->id]])
        ->orWhere([['sender_id','=',$user->id],['recipient_id','=',Auth::id()]])->delete();
        return redirect()->route('conversations.index')->with('success','The conversation is deleted.');

    }
}

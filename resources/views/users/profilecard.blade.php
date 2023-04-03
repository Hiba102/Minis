<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
     <div class="profile-card p-4"> <div class=" image d-flex flex-column justify-content-center align-items-center"> 
        <button class="btn2 btn btn-secondary"> 
        
            <img 
            @if($user->profile_photo_path )
            src="{{asset('storage/'.$user->profile_photo_path)}}" 
            @else 
            src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
            @endif
             height="100" width="100" style="border-radius: 50%;" />          
        </button>
         <span class="name mt-3">{{$user->name}}</span>
          <span class="idd">{{'@'}}{{$user->username}}</span>
          <br>
          <div class="inline">
          <div class="inline">
          @if(Auth::id()!=$user->id)
    @if(Auth::user()->is_following($user->id))
 
    <form action="{{route('unfollow',$user->id)}}" method="POST">
      @csrf
      @method('delete')
      <button class="btn btn-danger">unfollow</button>
     </form> 
     @else   
     <form action="{{route('follow',$user->id)}}" method="POST">
      @csrf
      <button class="btn btn-info">follow</button>
</form>
@endif
@endif
</div>
<div class="inline">

    @if(Auth::id()!=$user->id) 
    <a href="{{route('conversations.show',$user)}}" class="btn btn-warning">DM</a>
    @endif
    </div>
</div>

         
          <div class="d-flex flex-row justify-content-center align-items-center mt-3">
            
           <a 
           @if($user->followed_by()->count()>0)
           href="{{route('followers_list',$user)}}" 
           @endif
           style="text-decoration:none;">  <span class="number">{{$user->followed_by()->count()}} <span class="follow">Followers</span></span></a>
             &nbsp;  &nbsp;
             <a 
             @if($user->following()->count()>0)
             href="{{route('following_list',$user)}}"
             @endif
            style="text-decoration:none;"><span class="number">{{$user->following()->count()}} <span class="follow">Following</span></span></a>
             </div>
             
              <div class=" d-flex mt-2">
      
                 </div> 
                 <div class="text mt-3">
                     <span>{{$user->bio}} </span>
                     </div>
                   
                          <div class=" px-2 rounded mt-4 date ">
                             <span class="join">Joined {{date('m-Y', strtotime($user->created_at))}}</span> 
                            </div>
                         </div> 
                        </div>
</div>
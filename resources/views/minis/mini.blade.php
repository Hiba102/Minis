<?php $author=$mini->author()->first()?>
<div class="container m-3" style="width:1000px;">  
<div class="card text-center">
  <a href="{{route('users.show',$author->id)}}" style="text-decoration:none;">
  <div class="card-header">  
  @if($author->profile_photo_path )
  <img src="{{asset('storage/'.$author->profile_photo_path)}}" alt="no photo" style="width: 40px; height: 100%;">  
  @else 
  <img src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png" alt="no photo" style="width: 40px; height: 100%;">
  @endif
   {{$author->name}} - {{'@'}}{{$author->username}}
  
 </div></a>

 <a href="{{route('minis.show',$mini->id)}}" style="text-decoration:none;"><div class="card-body">
     <p class="card-text" style="text-align: left; color: #000000;"> {{$mini->body}} </p>
     <p style=" font-size: 0.65em; text-align: left; color: #000000;">Last updated: {{date('d-m-Y', strtotime($mini->updated_at))}}<p>
  </div></a>


  <div class="card-footer text-muted">
  <div class="inline">
    @if(Auth::id()==$mini->user_id)
   
      <a href="{{route('minis.edit',$mini)}}">Edit</a>
    @endif
    </div>
    <div class="inline">
    @if(Auth::id()!=$mini->user_id)
    @if(Auth::user()->is_following($mini->user_id))
    <form action="{{route('unfollow',$mini->user_id)}}" method="POST">
      @csrf
      @method('delete')
      <button class="btn btn-link">unfollow</button>
     </form> 
     @else   
     <form action="{{route('follow',$mini->user_id)}}" method="POST">
      @csrf
      <button class="btn btn-link">follow</button>
</form>
@endif
@endif
</div>
<div class="inline">    
    @if(Auth::id()==$mini->user_id)   
    <form action="{{route('minis.destroy',$mini)}}" method="POST">
      @csrf 
      @method('DELETE')
      <button class="btn btn-link">delete</button>
    </form>
    @endif
    </div>
    <div class="inline">
    @if(Auth::id()!=$mini->user_id) 
    <a href="{{route('conversations.show',$author)}}">send a message </a>
    @endif
    </div>
       
  </div>


</div>
</div>

@extends('layouts.app-main')
@section('content')
<div class="container">
<br><br><br>
@error('body')
<span class="error-msg">*{{$message}}</span>
@enderror


<form action="{{route('conversations.destroy',$other_user)}}" method="POST">
  @csrf 
  @method("delete")
  <button class="btn btn-danger">Delete Entire Conversation</button>

</form>
<div class="container m-5">
<section style="background-color: #CDC4F9;">
  <div class="container py-5">
    <div class="row">      
      <div class="col-md-12">  

        <div class="card" id="chat3" style="border-radius: 15px;">
        
          <div class="card-body" >
            

            <div class="row" style=" overflow-y:scroll;">
            
       
       
           


                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px;" > 
   @if($conversation->isNotEmpty()) 
  @foreach($conversation as $msg)  
  
  @if($msg->sender_id==Auth::id())
        <div class="d-flex flex-row justify-content-start">
  
  <img 
  @if (Auth::user()->profile_photo_path)  
  src="{{asset('storage/'.Auth::user()->profile_photo_path)}}"
  @else 
  src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
  @endif
  alt="no photo" style="width: 40px; height: 100%;">  
     <div>
      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{$msg->body}}</p>
      <p class="small ms-3 mb-3 rounded-3 text-muted float-end">{{$msg->created_at->format('d-m-y h:i:s')}}</p>
    </div>  </div>
 
  @else
  <?php $sender=$msg->sender()->first(); ?>
 
<div class="d-flex flex-row justify-content-end" style="">
                    <div>
                      <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{$msg->body}}</p>
                      <p class="small me-3 mb-3 rounded-3 text-muted">{{$msg->created_at->format('d-m-y h:i:s')}}</p>
                    </div>

  <img
  @if($sender->profile_photo_path)
  src="{{asset('storage/'.$sender->profile_photo_path)}}"
  @else
  src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
  @endif
  alt="no photo" style="width: 40px; height: 100%;">  
 
               
</div>






@endif
@endforeach
@else
<p>You have no messages with this user</p>
@endif
     
                </div>

             

            
            </div>


            <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                     
  <img 
  @if(Auth::user()->profile_photo_path)
  src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" 
  @else 
  src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
  @endif
  alt="no photo" style="width: 40px; height: 100%;">  
 
        
                  <form action="{{route('conversations.store',$other_user)}}" method="POST">
                    @csrf
                    <div class="inline">
                  <input type="text" name="body" class="form-control form-control-lg" id="exampleFormControlInput2"
                  placeholder="Type message" size="50">
</div>
                  <div class="inline">
                  <button>send</button>
                  </div>
                  </form>
</div>




          </div>
        </div>

      </div>
    </div>

  </div>
</section>
</div>

</div>

@endsection
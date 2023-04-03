@extends('layouts.app-main')

@section('content')

<br><br><br>
<div class="container m-5 p-2">

@if($usernames_list->isNotEmpty())
  <div class="container py-5">

                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                    <ul class="list-unstyled mb-0">
                    @foreach($usernames_list as $user)   
                  
                    <li class="p-2 border-bottom"
                    @if($user->is_opened)
                    style="background-color: azure;">
                    @else 
                    style="background-color: #FED0C7">
                    @endif
                      
                        <a href="{{route('conversations.show',$user->id)}}" class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                            <div>
                              <img
                              @if($user->profile_photo_path )
                              src="{{asset('storage/'.$user->profile_photo_path)}}"
                              @else
                              src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
                              @endif
                              alt="avatar" class="d-flex align-self-center me-3" width="60">
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1">
                              <p class="fw-bold mb-0">{{$user->username}}</p>
                              <p class="small text-muted">Click here to read the messages ...</p>
                            </div>
                          </div>
                          <div class="pt-1">
                            <p class="small text-muted mb-1">{{$user->last_message_date}}</p>                         
                          </div>
                        </a>
                      </li>
                      <br>
                     @endforeach                 
                    </ul>                   
                  </div>
@else 
<p>you have no messages with other users yet.</p>
 </div>
@endif
</div>

@endsection
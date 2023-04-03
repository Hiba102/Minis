@extends('layouts.app-main')

@section('content')

<br><br><br>

<div class="container m-5 p-2">
@if($users_list)
  <div class="container py-5">
                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                    <ul class="list-unstyled mb-0">
                    @foreach($users_list as $user)   
                     
                    <li class="p-2 border-bottom"  style="background-color: #DAFEC7;">                   
                        <a href="{{route('users.show',$user)}}" class="d-flex justify-content-between" style="text-decoration:none;  color: #000000;">
                          <div class="d-flex flex-row">
                            <div>
                              <img
                              @if($user->profile_photo_path)
                              src="{{asset('storage/'.$user->profile_photo_path)}}"
                              @else
                              src="https://feedback.seekingalpha.com/s/cache/ee/a8/eea83f8784094978a6277a8baf5f42ac.png"
                              @endif
                              alt="avatar" class="d-flex align-self-center me-3" width="60">
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1">
                            <p class="fw-bold mb-0">{{$user->name}} - {{'@'}}{{$user->username}}</p>
                          <p style=" font-size: 0.65em;">Click to see more info about this user ... </p>                                                
                            </div>

                          </div>
                          
 

                        </a>
                      </li>
                      <br>
                     @endforeach                 
                    </ul>
                                      
                  </div>
@else 
<p>no users yet.</p>
 </div>
@endif

</div>
</body>
</html>


@endsection


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('app.css') }}" />

    <title>@yield('title')</title>
  </head>
  <body>

  @include('flash-message')
  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">
        <a href="/" class="navbar-brand">Minis</a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a href="{{route('minis.create')}}" class="nav-link">Write a Minis</a>
            </li>          
           <li class="nav-item">
              <a href="{{route('users.show',Auth::id())}}" class="nav-link">My Profile</a>
            </li>
            <li class="nav-item">
              <a href="{{route('conversations.index')}}" class="nav-link">Messages
                @if(Auth::user()->has_new_messages()) 
                <span style="background-color:red;"class="badge">new</span> 
              @endif
            </a>
            </li>
            <li class="nav-item">
              <a href="{{route('discover')}}" class="nav-link">Discover</a>
            </li>
           
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->name}}
        </a>
     
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('profile.show') }}">Settings</a>
      
          <form method="POST" action="{{ route('logout') }}" >
            @csrf
          <button class="dropdown-item">logout</button>
          </form>
        </div>
      </li>

          </ul>
        </div>
      </div>
    </nav>



                         



@yield('content')
  
  
    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2021 Mini</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>

   
 
 




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
let textArea = document.getElementById("mini-body");
let characterCounter = document.getElementById("char_count");
const maxNumOfChars = 500;

const countCharacters = () => {
   
    let numOfEnteredChars = textArea.value.length;
    let counter = maxNumOfChars - numOfEnteredChars;
    
    characterCounter.textContent = counter + "/500";
    if (counter < 0) {
    characterCounter.style.color = "red";
} else if (counter < 20) {
    characterCounter.style.color = "orange";
} else {
    characterCounter.style.color = "black";
}
};

textArea.addEventListener("input", countCharacters);




</script>
</body>
</html>

@extends('layouts.app-main')





@section('content')
<div class="container">
<p>-------------------------------------------------------------------------------------</p>
<p>-------------------------------------------------------------------------------------</p>
<p>-------------------------------------------------------------------------------------</p>

<p>Hello {{Auth::user()->name}}</p>
       

            <div class="container" style="background-color:blue;">    

 
              
<p>here are your followers minis</p>
@forelse($minis as $mini)
@include('minis.mini')
<br>
@empty
<p>no minis yet, discover and follow</p>
@endforelse

</div>
</div>


            

@endsection
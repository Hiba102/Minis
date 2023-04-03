@extends('layouts.app-main')

@section('content')

        
@include('users.profilecard')   



<div class="container m-3 p-2">  
@if ($minis->isNotEmpty())
<p>Here is a list of all of {{$user->name}}'s' minis:</p>
@foreach($minis as $mini)
@include('minis.mini')
@endforeach
@else
<p>There are no minis yet.</p>
@endif
</div>
@endsection
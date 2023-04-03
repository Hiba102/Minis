@extends('layouts.app-main')
@section('title',$title)
@section('content')


<div class="container m-5">
@if($title=="My Minis")
<p>Here is a list of your minis</p>
@elseif($title=="Home Page")
<p>Here is a list of your followers minis</p>
@elseif($title=="Discover")
<p>Here is what users on this website are writing</p>
@endif

@forelse($minis as $mini)
@include('minis.mini')

@empty
<p>There are no minis yet!</p>
@endforelse
</div>
@endsection

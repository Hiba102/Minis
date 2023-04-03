@extends('layouts.app-main')
@section('content')
<br><br><br>
<div class="container m-5">
<form action="{{route('minis.store')}}" method="POST">
@csrf
@error('body')
    <span class="error-msg">*{{$message}}</span>
@enderror
  <div class="form-group">
    <label for="body">write your mini here:</label>
    <textarea class="form-control" name="body" id="mini-body"  placeholder="Whats in your mind today?" style="height:200px;"></textarea>
    <br>
    <div class="inline">          
    <button  class="btn btn-info">post it!</button>
    <span id="char_count"></span>
    </div>
  </div>
</form>
</div>
@endsection








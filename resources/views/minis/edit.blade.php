@extends('layouts.app-main')
@section('content')
<br><br><br>
<div class="container m-5">
@error('body')
<span class="error-msg">*{{$message}}</span>
    @enderror
<form action="{{route('minis.update',$mini->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="body">Edit your mini here:   </label>     
     <textarea class="form-control" name="body" id="mini-body" style="height:200px;">{{$mini->body}}</textarea>
        <br>  
    <div class="inline">          
          <button  class="btn btn-info">Edit</button>
          <span id="char_count"></span>
          </div>
</form>
</div>
@endsection


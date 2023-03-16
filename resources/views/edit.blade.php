@extends('master')
@section('title','create')
@section('content')
<h1>Form Page </h1>
@include('menu')
@php
  $hobbies=explode(",",$user->hobbies);
@endphp
<div class="container">
<form action="{{route('update')}}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ encrypt($user->user_id) }}">
  <div class="form-group">
    <label >Name</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">

  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" name="email" value="{{$user->email}}" class="form-control"  placeholder="Email">
  </div>
  <div class="form-group">
    <label >Date of Birth</label>
    <input type="text" name="date_of_birth" value="{{$user->date_of_birth_formated}}" class="form-control"  placeholder="Date of Birth">
  </div>
  <div class="container">
    <label>Hobbies</label>
    Football<input type="checkbox" name="hobbies[]" id="" value="football" {{ in_array('football',$hobbies)? 'checked':''}}>
    Cricket<input type="checkbox" name="hobbies[]" id="" value="cricket" {{ in_array('cricket',$hobbies)? 'checked':''}}>
    Music<input type="checkbox" name="hobbies[]" id="" value="music" {{ in_array('music',$hobbies)? 'checked':''}}>
    Movie<input type="checkbox" name="hobbies[]" id="" value="movie" {{ in_array('movie',$hobbies)? 'checked':''}}>
    @error('hobbies')<p class="alert-danger">{{$message}}</p>@enderror
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
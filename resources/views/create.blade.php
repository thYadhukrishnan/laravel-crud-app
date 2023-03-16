@extends('master')
@section('title','create')
@section('content')
<h1>Form Page </h1>
@include('menu')
<div class="container">
<form action="{{route('save')}}" method="post">
    @csrf
  <div class="form-group">
    <label >Name</label>
    <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">
    @error('name')<p class="alert-danger">{{$message}}</p>@enderror
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" name="email" class="form-control"  placeholder="Email">
    @error('email')<p class="alert-danger">{{$message}}</p>@enderror
  </div>
  <div class="form-group">
    <label >Date of Birth</label>
    <input type="text" name="date_of_birth" class="form-control"  placeholder="Date of Birth">
    @error('date_of_birth')<p class="alert-danger">{{$message}}</p>@enderror
  </div>
  <div class="container">
    <label>Hobbies</label>
    Football<input type="checkbox" name="hobbies[]" id="" value="football">
    Cricket<input type="checkbox" name="hobbies[]" id="" value="cricket">
    Music<input type="checkbox" name="hobbies[]" id="" value="music">
    Movie<input type="checkbox" name="hobbies[]" id="" value="movie">
    @error('hobbies')<p class="alert-danger">{{$message}}</p>@enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
@extends('master')
@section('title','create')
@section('content')
<h1>Form Page </h1>
@include('menu')
{{$current_page}}
<div class="container">
<form action="{{route('save')}}" method="post">
    @csrf
  <div class="form-group">
    <input type="hidden" name="page" value="{{$current_page}}">
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
  <label>Hobbies</label>
  <div class="form-check">
    
    <input  type="checkbox" name="hobbies[]" id="" value="football">Football<br>
    <input  type="checkbox" name="hobbies[]" id="" value="cricket">Cricket <br>
    <input  type="checkbox" name="hobbies[]" id="" value="music">Music <br>
    <input  type="checkbox" name="hobbies[]" id="" value="movie">Movie <br>
    @error('hobbies')<p class="alert-danger">{{$message}}</p>@enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
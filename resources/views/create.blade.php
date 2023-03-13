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

  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" name="email" class="form-control"  placeholder="Email">
  </div>
  <div class="form-group">
    <label >Date of Birth</label>
    <input type="text" name="date_of_birth" class="form-control"  placeholder="Date of Birth">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
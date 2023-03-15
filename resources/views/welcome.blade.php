@extends('master')
@section('title','Home')
@section('content')
    <h1>Welcome </h1>
    @if(session()->has('message'))
    <P>{{session()->get('message')}}</p>
    @endif
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('contact')}}">Contact-us</a></li>
    </ul>
<h3>Today is {{ date('d-M-Y')}}</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        <a href="{{ route('edit',encrypt($user->user_id)) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('delete',encrypt($user->user_id)) }}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{route('create')}}" class="btn btn-primary">New</a>

<a href="{{route('ajax')}}" class="btn btn-danger">Ajax</a>

@endsection
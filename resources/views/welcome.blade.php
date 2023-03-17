@extends('master')
@section('title','Home')
@section('content')

    <h1>Welcome </h1>
    @if(session()->has('message'))
    <P>{{session()->get('message')}}</p>
    @endif
@include('menu')
<h3>Today is {{ date('d-M-Y')}}</h3>
{{$current_page}}
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$users->firstItem() + $loop->index}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{$user->hobbies}}</td>
      <td>{{ $user->date_of_birth_formated }}</td>
      <td>
        <a href="{{ route('edit',[encrypt($user->user_id),'page'=>$current_page])}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('delete',encrypt($user->user_id)) }}" class="btn btn-danger" onclick="return deletebtn();">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div>{{$users->appends(request()->input())->links()}}</div>
<a href="{{route('create',$current_page)}}" class="btn btn-primary">New</a>

<a href="{{route('ajax')}}" class="btn btn-danger">Ajax</a>
<script>
  function deletebtn(){
  if(!confirm("Are you sure to delete this"))
  event.preventDefault();
}
</script>
@endsection
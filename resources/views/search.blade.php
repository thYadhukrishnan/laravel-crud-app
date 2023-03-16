<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>seaech</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  @include('menu')
<select name="name" id="name">
  <option value="">Select Category</option>
  @foreach ($users as $user)
  <option value="{{$user['user_id']}}">{{$user->name}}</option>
      
  @endforeach

</select>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>

    </tr>
  </thead>
  <tbody id="tbody">
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>

    </tr>
    @endforeach
  </tbody>
</table>

<script>
$(document).ready(function(){
  $("#name").on('change',function(){
    var name=$(this).val();
    $.ajax({
      url:"{{route('search')}}",
      type:"GET",
      data:{'name':name},
      success:function(data){
        var users=data.users;
        var html='';
        if(users.length>0){
          for(let i=0;i<users.length;i++){
            html +='<tr>\
                    <td>'+(i+1)+'</td>\
                    <td>'+users[i]['name']+'</td>\
                    <td>'+users[i]['email']+'</td>\
                    </tr>';

          }
        }
        else{
          html +='<tr>\
                  <td>No Data</td>\
                  </tr>';
        }
        $("#tbody").html(html);
      }
    });
  });
});
</script>

</body>
</html>
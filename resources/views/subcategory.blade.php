@extends('master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

@include('menu')

@foreach ($users as $user )

<button type="submit" class="btn btn-primary" id="name" value="{{$user->user_id}}">{{$user->name}}</button>



@endforeach

<span id="sbody">  </span>

<script>
    $(document).ready(function(){
      $("#name").on('click',function(){
        var name=$(this).val();
        $.ajax({
          url:"{{route('subcategory')}}",
          type:"GET",
          data:{'name':name},
          success:function(data){
            console.log(data);
            var users=data.users;
            var html='';
            if(users.length>0){
              for(let i=0;i<users.length;i++){
                html +=`<ul>
                    <li>`+users[i]['name']+`</li>
                    <li>`+users[i]['email']+`</li>
                    <li>`+users[i]['hobbies']+`</li>
                    </ul>`;
                
                

    
              }
            }
            else{
              html +=`<ul>
                      <li>No Data</li>
                      </ul>`;
            }
            $("#sbody").html(html);
          }
        });
      });
    });
    </script>

@endsection


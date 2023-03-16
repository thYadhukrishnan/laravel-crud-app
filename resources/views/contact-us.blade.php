@extends('master')
@section('title','contact')
@section('content')
<h1>Contact</h1>
@include('menu')


 <input type="search" name="name" id="">

<table class="table" id="tbl_data">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        
      </tr>
    </thead>
 
  </table>
<script>
    function myFunction(){
    var t_data = document.getElementById("tbl_data");
    var req=new XMLHttpRequest();

    req.open("GET","/contact",true);
    req.send();
    
    req.onreadystatechange = function(){
    
    if(req.readyState ==4 && req.status ==200){
        
        var obj=JSON.parse(req.responseText);
        console.log(obj);
        
        for(i=0; i<obj.data.length;i++){
            console.log(obj.data[i]['name']);
            console.log(obj.data[i]['email']);
            t_data.innerHTML += "<tr> <td>"+(i+1)+"</td> <td>"+obj.data[i]['name']+"</td> <td>"+obj.data[i]['email']+"</td> </tr>"
                }
        
            }
        }
    }
</script>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@include('menu')

<table class="table" id="table_data">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        
      </tr>
    </thead>
 
  </table>
<button class="btn btn-primary" onclick="myFunction()">Ajax</button>

  <script>
    function myFunction(){
    var t_data = document.getElementById("table_data");
    var req=new XMLHttpRequest();

    req.open("GET","/show",true);
    req.send();
    
    req.onreadystatechange = function(){
    
    if(req.readyState ==4 && req.status ==200){
        
        var obj=JSON.parse(req.responseText);
        //console.log(obj);
        
        for(i=0; i<obj.data.length;i++){
            console.log(obj.data[i]['name']);
            console.log(obj.data[i]['email']);
            t_data.innerHTML += "<tr> <td>"+(i+1)+"</td> <td>"+obj.data[i]['name']+"</td> <td>"+obj.data[i]['email']+"</td> </tr>"
        }
        
        }
    }
}

  </script>


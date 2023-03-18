<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@include('menu')
<table id="datatable" class="table">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Hobbies</th>
        <th scope="col">Date Of Birth</th>
      </tr>
</table>

<script>
    $(document).ready(function(){
        $.ajax({
            type:"GET",
            url:"{{route('show')}}",
            success:function(data){
                console.log(data);
                if(data.data.length > 0){
                    for(let i=0;i<data.data.length;i++){
                        $("#datatable").append(`<tr>
                            <td>`+(i+1)+`</td>
                            <td>`+data.data[i]['name']+`</td>
                            <td>`+data.data[i]['email']+`</td>
                            <td>`+data.data[i]['hobbies']+`</td>
                            <td>`+data.data[i]['date_of_birth']+`</td>
                            </tr>`);
                    }
                }
                else{
                    $("#datatable").append("<tr><td>No data</td></tr>");
                }
            },
            error:function(err){
                console.log(err.responseText);
            }
        });
    });
</script>
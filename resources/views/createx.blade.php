<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@include('menu')
<div class="container">
    <form  id="form">
        @csrf
      <div class="form-group">
       
        <label >Name</label>
        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter name">

      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" name="email" class="form-control"  placeholder="Email">
       
      </div>
      <button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button>
    </form>
</div> 

<span id="output"></span>

<script>
    $(document).ready(function(){
        $("#form").submit(function(event){
            event.preventDefault();
            var form=$("#form")[0];
            var data=new FormData(form);
            $("#btnsubmit").prop("disabled",true);
            
            $.ajax({
                type:"POST",
                url:"{{route('savex')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    $("#output").text(data.res);
                    $("#btnsubmit").prop("disabled",true);
                },
                error:function(e){
                    $("#output").text(e.responseText);
                    //console.log(e.responseText);
                    $("#btnsubmit").prop("disabled",false);
                }
            });
        });
    });
</script>
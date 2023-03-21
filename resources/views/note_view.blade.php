@include('menu')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Notes</th>
      </tr>
    </thead>
    <tbody>
      @foreach($note as $note)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{!! $note->notes !!}</td>

        <td>
          <a href="{{route('note_edit',encrypt($note->id))}}" class="btn btn-primary">Edit</a>
          <a href="{{route('delete_note',encrypt($note->id))}}" class="btn btn-danger" >Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


</table>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">

</script>

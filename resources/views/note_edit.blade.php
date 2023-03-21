@include('menu')

    <html >
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Summernote Editor </title>
            <!-- include libraries(jQuery, bootstrap) -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 offset-3 mt-4">
                        <div class="card-body">
                            <form method="post" action="{{route('update_note')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{ encrypt($note->id) }}">
                                <div class="form-group">
                                    <textarea name="note" id="summernote" > {!! $note->notes !!} </textarea>
                                </div>
                                <button type=”submit” class="btn btn-danger btn-block">Save</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <!-- summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script type="text/javascript">
            $('#summernote').summernote({
                height: 400
            });
        </script>
        </html>

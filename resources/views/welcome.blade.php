<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('app_name') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form enctype="multipart/form-data" method="POST" id="upload_form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>

                    <div class="form-group">
                      <textarea class="form-control" name="summernote" id="summernote" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            <div class="col-12" id="images"></div>
        </div>
    </div>
    <script src="{{ secure_url('js/app.js') }}"></script>
    <script src="{{ secure_url('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <script>
        var url = 'api/v1/articles';

        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                console.log(response);
                $.map(response.gambar, function (el) {
                    console.log(el);
                    $('#images').append('<img class="img-fluid" src="images/'+el+'" alt="" srcset="">');
                });
                
            }
        });

        $('form').submit(function (e) { 
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: url,
                data: new FormData(this),
                dataType: "json",
                success: function (response) {
                    console.log(response);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });  
        $(document).ready(function() {
            $('#summernote').summernote();
        });

    </script>
</body>
</html>
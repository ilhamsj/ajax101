<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('app_name') }}</title>
</head>
<body>
    <h1>Hello</h1>
{{public_path()}}
    <form enctype="multipart/form-data" method="POST" id="upload_form">
        @csrf
        <input type="file" name="gambar" id="gambar">
        <button type="submit">Upload</button>
    </form>

    <script src="{{ secure_url('js/app.js') }}"></script>
    <script src="{{ secure_url('js/jquery.min.js') }}"></script>
    <script>

        var url = 'api/v1/articles';

        $.ajax({
            type: "GET",
            url: url,
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                
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
    </script>
</body>
</html>
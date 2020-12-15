<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Barbershop List</title>

    <script src="{{asset("js/app.js")}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}

</head>
<body class="text-center">
    <div class="card shadow mt-4 d-inline-block" style="width:24em; max-width:calc(100% - 1em);">
        <div class="card-body text-left">
            <form action="{{route("add")}}" method="post" enctype="multipart/form-data" validate>
                @csrf
                <div class="w-100 border">
                    <img id="img" class="w-100" />
                </div>
                <div class="form-group mt-3">
                    <label for="fileLogo">Upload Barbershop Preview</label>
                    <input type="file" class="form-control-file" name="logo" id="fileLogo" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputName">Barbershop Name</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <textarea class="form-control mw-100" name="location" id="" rows="3" style="min-width:100%;" required></textarea>
                </div>
                <div class="form-group">
                  <label for="inputStars">Stars</label>
                  <input type="range" min=1 max=5 class="form-control-range" name="stars" value=1 id="inputStars" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        var fileLogo = $("#fileLogo");
        var img = $("#img");
        fileLogo.on("input", function(ev){
            input2image(fileLogo[0], img[0]);
        });

        function input2image(inputElement, imageElement){
            if (inputElement.files && inputElement.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imageElement.src = e.target.result;
                };

                reader.readAsDataURL(inputElement.files[0]);
            }
        }
    </script>
</body>
</html>

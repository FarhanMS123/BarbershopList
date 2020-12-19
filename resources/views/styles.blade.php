<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barbershop List</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-header clearfix">
                <a class="btn btn-outline-secondary" href="{{route("index")}}" role="button">Back</a>
            </div>
            <div class="card-body overflow-auto">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Styles</th>
                            <th>Location</th>
                            <th>Stars</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{$bs->id}}</td>
                            <td style="width:16em">@if ($bs->logo)
                                <img class="w-100" src="{{asset("logo/" . $bs->logo)}}" />
                            @endif</td>
                            <td>{{$bs->name}}</td>
                            <td>
                                @if (count($bs->styles) > 0)
                                    @for($i=0; $i<count($bs->styles); $i++)
                                        @if ($i == 0)
                                            {{ $bs->styles[$i]->name }}
                                        @else
                                            , {{ $bs->styles[$i]->name }}
                                        @endif
                                    @endfor
                                @else
                                    -
                                @endif
                            </td>
                            <td style="max-width:20em">{{$bs->location}}</td>
                            <td style="width:12em;">@for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $bs->stars)
                                <span class="material-icons" style="color:#f1c40f;">star</span>
                                @else
                                <span class="material-icons text-secondary">star</span>
                                @endif
                            @endfor</td>
                            <td style="width:11em;">
                                <a class="btn btn-primary" href="{{route("view_edit", $bs->id)}}" role="button">Edit</a>
                                <form class="d-inline-block" action="{{route("delete", $bs->id)}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @foreach ($errors->getBags() as $error)
            <div class="alert alert-danger mb-4" role="alert">
                <strong>{{$error}}</strong>
            </div>
        @endforeach
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{route("style_add", $bs->id)}}" method="post" class="clearfix">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Style Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-6">
                            <label>Prices</label>
                            <input type="number" class="form-control" name="price" value="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="add" value="true">Add</button>
                </form>
            </div>
        </div>
        @if (count($bs->styles) > 0)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        @foreach ($bs->styles as $style)
                        <tr>
                            <form action="{{route("style_edit", $style->id)}}" method="post">
                                @csrf
                                @method("patch")
                                <td scope="row"><input type="text" class="form-control" name="name" value="{{$style->name}}"></td>
                                <td><input type="number" class="form-control" name="price" value="{{$style->price}}"></td>
                                <td><button type="submit" class="btn btn-primary">Save</button></td>
                            </form>
                            <form action="{{route("style_delete", $style->id)}}" method="post">
                                @csrf
                                @method("delete")
                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</body>
</html>

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
        <div class="card shadow-sm">
            <div class="card-header clearfix">
                <a class="btn btn-primary float-right" href="{{route("view_add")}}" role="button">Add list</a>
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
                        @foreach ($list as $bs)
                            <tr>
                                <td scope="row">{{$bs->id}}</td>
                                <td style="width:16em">@if ($bs->logo)
                                    <img class="w-100" src="{{asset("logo/" . $bs->logo)}}" />
                                @endif</td>
                                <td><a href="{{route("style_index", $bs->id)}}">{{$bs->name}}</a></td>
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
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

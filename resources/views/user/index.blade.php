@extends("layout")
@section("title", "show data")
@section("content")

<div class="container">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Name</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td><img src="{{asset('images/item_imageDec-2021'.'/'.$value->image)}}" width="50px" height="50px" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
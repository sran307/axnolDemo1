@extends("layout")
@section("title", "show data")
@section("content")

<div class="container">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Name</th>
                <th>country</th>
                <th>state</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <?php $country_id=$value->country_id;
                    $country=App\Models\add_item::find($country_id)->country;
                    echo $country->country ?>
                </td>
                <td>
                    <?php $state_id=$value->state_id;
                    $state=App\Models\state::find($state_id)->state;
                    echo $state ?>
                </td>
                <td><img src="{{ asset('images/item_imageDec-2021'.'/'.$value->image)}}" width="50px" height="50px" alt="images"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends("layout")
@section("title", "Add_item")
@section("content")
<?php
    use App\Models\country;
    use App\Models\state;

    function fill_country(){
        $data=country::all();
        $output='';
        foreach($data as $value)
        {
            $output.="<option value='".$value["id"]."'>".$value["country"]."</option>";
        }
        return $output;
    }
    
?>
    <div class="container">
        <form action="add_item_form" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>sl no</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>Image</th>
                        <th><button id="add-row" type="button"><span class="glyphicon glyphicon-plus"></span></button></th>
                    </tr> 
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
    </div>
@endsection
@section("script")
    <script type="text/javascript">
        $(document).ready(function () {
            var count=0;
            $(document).on("click", "#add-row", function () {
                count++;
                $("tbody").append("<tr>\
                <td>"+count+"</td>\
                <td><input type='text' class='form-control' name='name[]' ></td>\
                <td><select name='country[]' id='country-select' data-state_id='"+count+"'>\
                <option value=''>Select a country</option>\
                <?php echo fill_country() ?>
                </select></td>\
                <td><select name='state[]' id='state_id"+count+"'>\
                <option value=''>Select a state</option>\
                </select></td>\
                <td><input type='file' name='image[]'></td>\
                <td><button type='button' class='remove-button'><span class='glyphicon'></span></button></td>\
                </tr>")
            });
            $(document).on("click", ".remove-button", function () {
                $(this).closest("tr").remove();
            });
            $(document).on("change", "#country-select", function () {
                var country_id=$(this).val();
                var state_id=$(this).data('state_id');
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "{{route('state')}}",
                    data:{country_id:country_id},
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        var html='<option value="">Select a State</option>';
                        html+=response.data;
                        $('#state_id'+state_id).html(html);
                    }
                });
            });
        });
    </script>

@endsection
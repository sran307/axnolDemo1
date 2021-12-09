<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Add_item, state, country
};
class ShowData extends Controller
{
    public function index()
    {
        $data= Add_item::all();
        //$country=add_item::find(1)->country;
        //$states=state::find(4)->state;
        //return $states;
       
        return view("admin.index",["data"=>$data]);
    }
}

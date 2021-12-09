<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_item;
class ShowData extends Controller
{
    public function index()
    {
        $data= Add_item::all();
        
        return view("user.index",["data"=>$data]);
    }
}

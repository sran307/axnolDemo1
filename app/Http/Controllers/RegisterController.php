<?php

namespace App\Http\Controllers;
//namespace Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Models\state;
use App\Models\country;
use App\Models\register;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use DB;


class RegisterController extends Controller
{
    
   
    public function layout()
    {
        return view("layout");
    }
    public function state(Request $request)
    {
        $id=$request->post("country_id");
        $state=state::where("country_id",$id)->get();
        $data='';
        foreach($state as $value)
        {
            $data.="<option value='$value->id'>$value->state</option>";
        }
        return response()->json([
            "data"=>$data
        ]);
    }
    public function registration(Request $request){
       
        $validator=Validator::make($request->all(),[
            "first_name"        =>  "required | max:255",
            "last_name"         =>  "nullable",
            "email"             =>  "required |email | unique:registers",
            "password"          =>  "required",
            "image"          =>  "required"
        ])->validate();
        $image=$request->file("image");
        $image_name=$image->getClientOriginalName();
        $date=date('M-Y');
        $destination="images/".$date;
        $image->move($destination, $image_name);
        register::create([
            "name"=>$request->post("first_name"),
            "email"=>$request->post("email"),
            "password"=>md5($request->post("password")),
            "image"=>$image_name
        ]);
        return back()->with(Session::flash("success", "Registration completed"));
    }
    public function register()
    {
        return view ("register");
    }

    public function login_form(Request $request)
    {
        $email=$request["email"];
        $password=$request["password"];
        $data=register::where("email",$email)->get();
        if(count($data)>0)
        {
            foreach($data as $value)
            {
                $id=$value["id"];
                $name=$value["name"];
            }
            session()->put(["login_id"=>$id, "name"=>$name]);
            return redirect()->route("home")->with(Session::flash("message", "login successfull"), Session::flash("alert-class", "alert-success"));
        }
        else
        {
            Session::flash("message", "login failed");
            return back();
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route("home");
    }
    public function add_item_form(Request $request)
    {
        $name=$request->post("name");
        $country=$request->post("country");
        $state=$request->post("state");

        $images=$request->file("image");
        
        $date=date("M-Y");
        $destination="images/item_image".$date;
        $img=[];
        foreach($images as $image)
        {
            array_push($img, $image_name= $image->getClientOriginalName());
            $image->move($destination, $image_name);
        }
        for($i=0; $i<length($name); $i++)
        {
            DB::beginTransaction();
            try
            {
                add_item::create([
                    "name"=>$name[$i],
                    "country"=>$country[$i],
                    "state"=>$state[$i],
                    "image"=>$img[$i]
                ]);
                DB::commit();

            }
            catch(\Exception $e)
            {
                DB::rollback();
            }
        }
    }
}

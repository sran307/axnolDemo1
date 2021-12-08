<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Models\register;
class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
        $this->_registerLoginUser($user);
        session()->put(["login_id"=>$user->id, "name"=>$user->name]);
        return redirect()->route("home")->with(Session::flash("message", "login successfull"), Session::flash("alert-class", "alert-success"));

        // $user->token;
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }
    protected function _registerLoginUser($data)
    {
        $user=register::where("email",$data->email)->first();
        if(!$user)
        {
            register::create([
                "name"=>$data->name,
                "email"=>$data->email,
                "provider_id"=>$data->id,
                "avatar"=>$data->avatar,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function check(Request $request)
    {
       
        $check = $request->only("name", "password");
        if (Auth::attempt($check)) {
            // $request->session()->regenerate();
            $token = $request->user()->createToken("token")->plainTextToken;
            return response()->json(["success" => true,"token"=>$token,"id"=>Auth::user()->id,"name"=>Auth::user()->name,"email"=>Auth::user()->email], 200);
        }
        return response()->json(["success" => false, "message" => "アカウントまたはパスワードが正しくありません"], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(["success"=>true]);
    }
}

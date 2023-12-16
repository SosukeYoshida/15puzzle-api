<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    //
    public function getUser()
    {
        $user = Auth::user();
        return response()->json($user);
    }
    public function postUser(Request $request, $id)
    {
        $request->validate([
        "name"=>"required",
        "email"=>"required"
        ]);


        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email
        ]);
        return response()->json(["success" => true, "message" => "編集が完了しました"], 200);
    }
}

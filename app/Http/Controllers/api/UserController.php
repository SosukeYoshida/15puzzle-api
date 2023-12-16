<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);
        $message = "登録が完了しました";
        return  response()->json([ "success"=>true,"message"=>$message], 200);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $id->
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,string $id)
    // {
    //     //
    //     $user = User::find($id);
    //     $request->validate([
    //         "name" => "required",
    //         "email" => "required",
    //     ]);
    //     $user->update([
    //         "name" => $request->name,
    //         "email" =>$request->email,
    //     ]);
    //     return response()->json(["success"=>true],200);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

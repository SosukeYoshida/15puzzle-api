<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ResultController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/auth/login", [LoginController::class, "check"])->name("check");
Route::post("/auth/create/user",[UserController::class,"store"])->name("create_user");

Route::middleware("auth:sanctum")->get("/auth/logout", [LoginController::class, "logout"])->name("logout");
Route::middleware("auth:sanctum")->post("/create_user", [UserController::class, "store"])->name("create_user");
Route::middleware("auth:sanctum")->post('/edit_user/{id}', [UserController::class, "update"])->name("edit_user");
Route::middleware("auth:sanctum")->get("/fields", function () {
    $fields =  [
        [0, 0, 0, 0, 0, 0],
        [0, 1, 2, 3, 4, 0],
        [0, 5, 6, 7, 8, 0],
        [0, 9, 10, 11, 12, 0],
        [0, 13, 14, 15, -1, 0],
        [0, 0, 0, 0, 0, 0],
    ];
    return response()->json($fields);
});
Route::middleware("auth:sanctum")->get('/getUser', [SettingController::class, "getUser"])->name("getUser");
Route::middleware("auth:sanctum")->post('/postUser/{id}', [SettingController::class, "postUser"])->name("postUser");
Route::get('/results', [ResultController::class, "index"])->name("index_results");
Route::middleware("auth:sanctum")->post('/results/post', [ResultController::class, "update"])->name("index_update");

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/articles', function () {

    $files = array_diff(scandir(public_path().'\images'), array('.', '..'));
    return response()->json([
        'gambar' => $files,
    ]);
});

Route::post('v1/articles', function (Request $request) {
    $validate = $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if($request->hasFile('gambar')) {

        $request->file('gambar')->storeAs('', $request->file('gambar')->getClientOriginalName(), 'public_uploads');

        return response()->json([
            'status' => 'images/'.$request->file('gambar')->getClientOriginalName(),
        ]);
    }
});

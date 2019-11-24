<?php

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\TestResource;
use Illuminate\Support\Facades\Storage;

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
    return new TestResource(Article::all());
});

Route::post('v1/articles', function (Request $request) {
    $validate = $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if($request->hasFile('gambar')) {

        $request->gambar->store('images');

        return response()->json([
            'status' => 'data berhasil di upload'
        ]);
    }
});

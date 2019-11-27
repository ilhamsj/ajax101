<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function storeImages(Request $request) {
        $validate = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('', $request->file('gambar')->getClientOriginalName(), 'public_uploads');
            return response()->json([
                'req'   => $request->all(),
                'status' => env('app_url').'images/'.$request->file('gambar')->getClientOriginalName(),
            ]);
        }
    }
    
    public function showImages(Request $request) {
        $files = array_diff(scandir(public_path().'\images'), array('.', '..'));
        return response()->json([
            'gambar' => $files,
        ]);
    }
    
}

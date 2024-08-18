<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $request->validate([
            'image'=> 'required|image|max:2048',
        ]);
        if (isset($request->image)) {
                $new_image = FileService::upload_file($request->file('image'), 'images');
                Image::create(['path'=>$new_image,'sport_id'=>$request->sport_id]);

        }

    }

    public function show($id){

    }

    public function update($id){

    }

    public function destroy(Image $image){
         FileService::delete_file($image);
    }
}

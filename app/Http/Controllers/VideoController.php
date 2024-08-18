<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Models\Video;


class VideoController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $request->validate([
            'video'=> 'required|video',
        ]);
        if (isset($request->image)) {
                $new_video = FileService::upload_file($request->file('video'), 'videos');
                Video::create(['path'=>$new_video,'sport_id'=>$request->sport_id]);

        }
    }

    public function show($id){

    }

    public function update($id){

    }

    public function destroy(Video $video){
            FileService::delete_file($video);

    }
}

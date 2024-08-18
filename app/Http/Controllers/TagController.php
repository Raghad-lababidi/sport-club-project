<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Exception;

class TagController extends Controller
{
    public function index(){
        try {
            $tags =Tag::all() ;

            return $this->sendResponse('', $tags);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $tag= Tag::create($request->validated());

            return $this->sendResponse('added successfully', $tag);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Tag $tag){
        try {
            return $this->sendResponse('', $tag->with('articles'));
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, Tag $tag){
        try {
           $tag->update($request->validated());

            return $this->sendResponse('updated successfully', $tag);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Tag $tag){
        try {
            $tag->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

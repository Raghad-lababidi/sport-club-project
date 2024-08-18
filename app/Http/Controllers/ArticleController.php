<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Exception;

class ArticleController extends Controller
{
    public function index(){
        try {
            $articles =Article::all() ;

            return $this->sendResponse('', $articles);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(ArticleRequest $request){
        try {
            $article= Article::create($request->validated());

            return $this->sendResponse('added successfully', $article);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Article $article){
        try {
            return $this->sendResponse('', $article);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(ArticleRequest $request, Article $article){
        try {
           $article->update($request->validated());

            return $this->sendResponse('updated successfully', $article);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Article $article){
        try {
            $article->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }



}

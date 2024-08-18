<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function index(){
        try {
            $categories =Category::all() ;

            return $this->sendResponse('', $categories);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $category= Category::create($request->validated());

            return $this->sendResponse('added successfully', $category);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Category $category){
        try {
            return $this->sendResponse('', $category->with('articles'));
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, Category $category){
        try {
           $category->update($request->validated());

            return $this->sendResponse('updated successfully', $category);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Category $category){
        try {
            $category->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

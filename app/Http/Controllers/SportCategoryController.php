<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportCategory;
use Exception;

class SportCategoryController extends Controller
{
    public function index(){
        try {
            $categories =SportCategory::all() ;

            return $this->sendResponse('', $categories);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $category= SportCategory::create($request->validated());

            return $this->sendResponse('added successfully', $category);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(SportCategory $category){
        try {
            return $this->sendResponse('', $category);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, SportCategory $category){
        try {
           $category->update($request->validated());

            return $this->sendResponse('updated successfully', $category->with('sports'));
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(SportCategory $category){
        try {
            $category->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

}

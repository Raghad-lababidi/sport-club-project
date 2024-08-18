<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Http\Requests\SportRequest;
use Exception;

class SportController extends Controller
{
    public function index(){
        try {
            $sports =Sport::all() ;

            return $this->sendResponse('', $sports);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(SportRequest $request){
        try {
            $sport= Sport::create($request->validated());

            return $this->sendResponse('added successfully', $sport);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Sport $sport){
        try {
            return $this->sendResponse('', $sport->with('facilities','days','rooms','images','videos'));
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(SportRequest $request, Sport $sport){
        try {
            $sport->update($request->validated());

            return $this->sendResponse('updated successfully', $sport);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Sport $sport){
        try {
            $sport->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

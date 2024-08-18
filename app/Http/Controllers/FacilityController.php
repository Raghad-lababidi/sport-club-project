<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Http\Requests\FacilityRequest;
use Exception;

class FacilityController extends Controller
{
    public function index(){
        try {
            $facilities =Facility::all() ;

            return $this->sendResponse('', $facilities);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(FacilityRequest $request){
        try {
            $facility= Facility::create($request->validated());

            return $this->sendResponse('added successfully', $facility);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Facility $facility){
        try {
            return $this->sendResponse('', $facility);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(FacilityRequest $request, Facility $facility){
        try {
           $facility->update($request->validated());

            return $this->sendResponse('updated successfully', $facility);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Facility $facility){
        try {
            $facility->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

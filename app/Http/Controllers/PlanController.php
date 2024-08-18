<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Exception;

class PlanController extends Controller
{
    public function index(){
        try {
            $plans =Plan::all() ;

            return $this->sendResponse('', $plans);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $plan= Plan::create($request->validated());

            return $this->sendResponse('added successfully', $plan);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Plan $plan){
        try {
            return $this->sendResponse('', $plan);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, Plan $plan){
        try {
           $plan->update($request->validated());

            return $this->sendResponse('updated successfully', $plan);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Plan $plan){
        try {
            $plan->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

}

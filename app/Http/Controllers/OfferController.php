<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Exception;

class OfferController extends Controller
{
    public function index(){
        try {
            $offers =Offer::all() ;

            return $this->sendResponse('', $offers);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $offer= Offer::create($request->validated());

            return $this->sendResponse('added successfully', $offer);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Offer $offer){
        try {
            return $this->sendResponse('', $offer);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, Offer $offer){
        try {
           $offer->update($request->validated());

            return $this->sendResponse('updated successfully', $offer);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Offer $offer){
        try {
            $offer->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Exception;

class PaymentController extends Controller
{
    public function index(){
        try {
            $payments =Payment::all() ;

            return $this->sendResponse('', $payments);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(Request $request){
        try {
            $payment= Payment::create($request->validated());

            return $this->sendResponse('added successfully', $payment);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Payment $payment){
        try {
            return $this->sendResponse('', $payment);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(Request $request, Payment $payment){
        try {
           $payment->update($request->validated());

            return $this->sendResponse('updated successfully', $payment);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Payment $payment){
        try {
            $payment->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

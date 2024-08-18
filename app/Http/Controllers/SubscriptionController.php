<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Http\Requests\SubscriptionRequest;
use Exception;

class SubscriptionController extends Controller
{
    public function index(){
        try {
            $subscriptions =Subscription::all() ;

            return $this->sendResponse('', $subscriptions);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(SubscriptionRequest $request){
        try {
            $subscription= Subscription::create($request->validated());

            return $this->sendResponse('added successfully', $subscription);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Subscription $subscription){
        try {
            return $this->sendResponse('', $subscription);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(SubscriptionRequest $request, Subscription $subscription){
        try {
           $subscription->update($request->validated());

            return $this->sendResponse('updated successfully', $subscription);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Subscription $subscription){
        try {
            $subscription->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function renew(Request $request, Subscription $subscription){
        try {
           $subscription->update(['status'=>$request->new_status,'end_date'=>$request->end_date,]);

            return $this->sendResponse('updated successfully', $subscription);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function cancel(Request $request, Subscription $subscription){
        try {
           $subscription->update([
            'status'=>$request->new_status,
            'end_date'=>$request->end_date,
            'cancel_reason'=>$request->reason]);

            return $this->sendResponse('updated successfully', $subscription);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

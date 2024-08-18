<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use Exception;

class MemberController extends Controller
{
    public function index(){
        try {
            $members =Member::all() ;

            return $this->sendResponse('', $members);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(MemberRequest $request){
        try {
            $member= Member::create($request->validated());

            return $this->sendResponse('added successfully', $member);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Member $member){
        try {
            return $this->sendResponse('', $member->with('payments'));
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(MemberRequest $request, Member $member){
        try {
           $member->update($request->validated());

            return $this->sendResponse('updated successfully', $member);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Member $member){
        try {
            $member->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}

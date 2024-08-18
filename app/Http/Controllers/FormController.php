<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Exception;

class FormController extends Controller
{
    public function index(){
        try {
            $forms =Form::all() ;

            return $this->sendResponse('', $forms);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }
    public function store(Request $request){
        try {
            $form= Form::create($request->validated());

            return $this->sendResponse('added successfully', $form);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }
}


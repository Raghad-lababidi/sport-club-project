<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;
use Exception;

class RoomController extends Controller
{
    public function index(){
        try {
            $rooms =Room::all() ;

            return $this->sendResponse('', $rooms);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function store(RoomRequest $request){
        try {
            $room= Room::create($request->validated());

            return $this->sendResponse('added successfully', $room);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function show(Room $room){
        try {
            return $this->sendResponse('', $room);
        } catch (Exception $e) {
            return $this->sendError('error in get data', 500);
        }

    }

    public function update(RoomRequest $request, Room $room){
        try {
           $room->update($request->validated());

            return $this->sendResponse('updated successfully', $room);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

    public function destroy(Room $room){
        try {
            $room->delete();

            return $this->sendResponse('deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }

}

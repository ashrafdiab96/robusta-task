<?php

namespace App\Http\Controllers\Client\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use \Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * get function
     * @method (get specific booking)
     * @link {domain}/book/me/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = Booking::where([['id', $id], ['user_id', Auth::user()->id]])->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all bookings)
     * @link {domain}/book/me/getAll
     * @return object
     */
    public function getAll()
    {
        $record = Booking::where('user_id', Auth::user()->id)->get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get bookings with paginate)
     * @link {domain}/book/me/getPaginate
     * @param integer $id
     * @return object
     */
    public function getPaginate()
    {
        $record = Booking::where('user_id', Auth::user()->id)->paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new booking)
     * @link {domain}/book/me/create
     * @param Request $request
     * @return response
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'trip_id' => 'required',
            'trip_stop_id' => 'required',
            'bus_id' => 'required',
            'seat_id' => 'required',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $checkAvailability = $this->checkBookingAvailability($request);
        if (!$checkAvailability) {
            return response()->json([
                'message' => 'This seat is already booked',
            ], 405);
        }

        try {
            $record = new Booking();
            $record->trip_id = $request->trip_id;
            $record->trip_stop_id = $request->trip_stop_id;
            $record->bus_id = $request->bus_id;
            $record->seat_id = $request->seat_id;
            $record->user_id = Auth::user()->id;
            $record->save();
            return response()->json([
                'message' => 'Booking created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * checkBookingAvailability function
     * @method (check if seat is available)
     * @param Request $request
     * @return boolean
     */
    private function checkBookingAvailability($request)
    {
        $tripId = $request->trip_id;
        $stopId = $request->trip_stop_id;
        $busId = $request->bus_id;
        $seatId = $request->seat_id;
        $booking = Booking::where([
            ['trip_id', $tripId],
            ['trip_stop_id', $stopId],
            ['bus_id', $busId],
            ['seat_id', $seatId]
        ])->first();
        return $booking ? false : true;
    }

    /**
     * create function
     * @method (create new booking)
     * @link {domain}/book/me/update
     * @param Request $request
     * @return object
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'trip_id' => 'required',
            'trip_stop_id' => 'required',
            'bus_id' => 'required',
            'seat_id' => 'required',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $record = Booking::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Booking wit id: '.$id.' is not fount']);
        }

        $checkAvailability = $this->checkBookingAvailability($request);
        if (!$checkAvailability) {
            return response()->json([
                'message' => 'This seat is already booked',
            ], 405);
        }

        try {
            $record->trip_id = $request->trip_id;
            $record->trip_stop_id = $request->trip_stop_id;
            $record->bus_id = $request->bus_id;
            $record->seat_id = $request->seat_id;
            $record->save();
            return response()->json([
                'message' => 'Booking updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete booking)
     * @link {domain}/book/me/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = Booking::where([['id', $id], ['user_id', Auth::user()->id]])->first();
        if (!$record) {
            return response()->json(['message' => 'Booking wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'Booking deleted successfully'], 204);
    }

}

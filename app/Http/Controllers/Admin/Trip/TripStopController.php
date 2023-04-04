<?php

namespace App\Http\Controllers\Admin\Trip;

use App\Http\Controllers\Controller;
use App\Models\TripStop;
use Illuminate\Http\Request;
use \Validator;

class TripStopController extends Controller
{
    /**
     * create function
     * @method (create new trip stop)
     * @link {domain}/trip/stop/create
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'trip_id' => 'required',
            'start_city' => 'required',
            'end_city' => 'required',
            'date' => 'required|date',
            'deprature_time' => 'required|date_format:H:i:s',
            'arrival_time' => 'required|date_format:H:i:s',
            'cost' => 'required|numeric',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $record = new TripStop();
            $record->trip_id = $request->trip_id;
            $record->start_city = $request->start_city;
            $record->end_city = $request->end_city;
            $record->date = $request->date;
            $record->deprature_time = $request->deprature_time;
            $record->arrival_time = $request->arrival_time;
            $record->cost = $request->cost;
            $record->save();
            return response()->json([
                'message' => 'Trip stop created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * update function
     * @method (update trip stop)
     * @link {domain}/trip/stop/update
     * @param Request $request
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'trip_id' => 'required',
            'start_city' => 'required',
            'end_city' => 'required',
            'date' => 'required|date',
            'deprature_time' => 'required|date_format:H:i:s',
            'arrival_time' => 'required|date_format:H:i:s',
            'cost' => 'required|numeric',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = TripStop::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Trip wit id: '.$id.' is not fount']);
        }
        try {
            $record->trip_id = $request->trip_id;
            $record->start_city = $request->start_city;
            $record->end_city = $request->end_city;
            $record->date = $request->date;
            $record->deprature_time = $request->deprature_time;
            $record->arrival_time = $request->arrival_time;
            $record->cost = $request->cost;
            $record->save();
            return response()->json([
                'message' => 'Trip stop updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete trip stop)
     * @link {domain}/trip/stop/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = TripStop::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Trip stop wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'Trip deleted successfully'], 204);
    }

}

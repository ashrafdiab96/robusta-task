<?php

namespace App\Http\Controllers\Admin\Trip;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * get function
     * @method (get specific trip)
     * @link {domain}/trip/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = Trip::with('tripsStops')->where('id', $id)->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all trip)
     * @link {domain}/trip/getAll
     * @return object
     */
    public function getAll()
    {
        $record = Trip::with('tripsStops')->get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get trip with paginate)
     * @link {domain}/trip/getPaginate
     * @param integer $id
     * @return object
     */
    public function getPaginate()
    {
        $record = Trip::with('tripsStops')->paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new trip)
     * @link {domain}/trip/update
     * @param Request $request
     * @return response
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:3|max:60',
            'start_city' => 'required',
            'end_city' => 'required',
            'date' => 'required|date',
            'deprature_time' => 'required|date_format:H:i:s',
            'arrival_time' => 'required|date_format:H:i:s',
            'tripStops.*.start_city' => 'required',
            'tripStops.*.end_city' => 'required',
            'tripStops.*.deprature_time' => 'required|date_format:H:i:s',
            'tripStops.*.arrival_time' => 'required|date_format:H:i:s',
            'tripStops.*.cost' => 'required|numeric',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        DB::beginTransaction();
        try {
            $tripId = DB::table('trips')->insertGetId([
                'title' => $request->title,
                'start_city' => $request->start_city,
                'end_city' => $request->end_city,
                'date' => $request->date,
                'deprature_time' => $request->deprature_time,
                'arrival_time' => $request->arrival_time,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ($request->tripStops as $stop) {
                DB::table('trips_stops')->insert([
                    'trip_id' => $tripId,
                    'start_city' => $stop['start_city'],
                    'end_city' => $stop['end_city'],
                    'date' => $stop['date'],
                    'deprature_time' => $stop['deprature_time'],
                    'arrival_time' => $stop['arrival_time'],
                    'cost' => $stop['cost'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::commit();

            $record = Trip::with('tripsStops')->where('id', $tripId)->first();
            return response()->json([
                'message' => 'Trip created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * update function
     * @method (update trip)
     * @link {domain}/trip/update
     * @param Request $request
     * @return response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:3|max:60',
            'start_city' => 'required',
            'end_city' => 'required',
            'date' => 'required|date',
            'deprature_time' => 'required|date_format:H:i:s',
            'arrival_time' => 'required|date_format:H:i:s',
            'tripStops.*.start_city' => 'required',
            'tripStops.*.end_city' => 'required',
            'tripStops.*.deprature_time' => 'required|date_format:H:i:s',
            'tripStops.*.arrival_time' => 'required|date_format:H:i:s',
            'tripStops.*.cost' => 'required|numeric',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = Trip::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Trip wit id: '.$id.' is not fount']);
        }

        DB::beginTransaction();
        try {
            DB::table('trips')->where('id', $id)->update([
                'title' => $request->title,
                'start_city' => $request->start_city,
                'end_city' => $request->end_city,
                'date' => $request->date,
                'deprature_time' => $request->deprature_time,
                'arrival_time' => $request->arrival_time,
                'updated_at' => now(),
            ]);
            foreach ($request->tripStops as $stop) {
                if (isset($stop['id'])) {
                    DB::table('trips_stops')->where('id', $stop['id'])->update([
                        'start_city' => $stop['start_city'],
                        'end_city' => $stop['end_city'],
                        'date' => $stop['date'],
                        'deprature_time' => $stop['deprature_time'],
                        'arrival_time' => $stop['arrival_time'],
                        'cost' => $stop['cost'],
                        'updated_at' => now(),
                    ]);
                } else {
                    DB::table('trips_stops')->insert([
                        'trip_id' => $id,
                        'start_city' => $stop['start_city'],
                        'end_city' => $stop['end_city'],
                        'date' => $stop['date'],
                        'deprature_time' => $stop['deprature_time'],
                        'arrival_time' => $stop['arrival_time'],
                        'cost' => $stop['cost'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            DB::commit();

            $record = Trip::with('tripsStops')->where('id', $id)->first();
            return response()->json([
                'message' => 'Trip updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete trip)
     * @link {domain}/trip/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = Trip::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Trip wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'Trip deleted successfully'], 204);
    }

}

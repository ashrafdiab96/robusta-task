<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use App\Models\BusSeat;
use \Validator;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * get function
     * @method (get specific seat)
     * @link {domain}/seat/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = BusSeat::where('id', $id)->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all seats)
     * @link {domain}/seat/getAll
     * @return object
     */
    public function getAll()
    {
        $record = BusSeat::get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get seats with paginate)
     * @link {domain}/seat/getPaginate
     * @return object
     */
    public function getPaginate()
    {
        $record = BusSeat::paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new seat)
     * @link {domain}/seat/create
     * @param Request $request
     * @return object
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'bus_id' => 'required',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $record = new BusSeat();
            $record->bus_id = $request->bus_id;
            $record->save();
            return response()->json([
                'message' => 'Seat created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * update function
     * @method (update seat)
     * @link {domain}/seat/update
     * @param Request $request
     * @return object
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'bus_id' => 'required',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = BusSeat::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.$id.' is not fount']);
        }
        try {
            $record->bus_id = $request->bus_id;
            $record->save();
            return response()->json([
                'message' => 'Seat updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete seat)
     * @link {domain}/seat/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = BusSeat::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Seat wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'Seat deleted successfully'], 204);
    }

}

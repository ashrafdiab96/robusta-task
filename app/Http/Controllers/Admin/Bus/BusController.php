<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusSeat;
use \Validator;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * get function
     * @method (get specific bus)
     * @link {domain}/bus/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = Bus::where('id', $id)->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all buses)
     * @link {domain}/bus/getAll
     * @return object
     */
    public function getAll()
    {
        $record = Bus::get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get buses with paginate)
     * @link {domain}/bus/getPaginate
     * @return object
     */
    public function getPaginate()
    {
        $record = Bus::paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new bus)
     * @link {domain}/bus/create
     * @param Request $request
     * @return object
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'bus_code' => 'required|unique:buses|min:3|max:6',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $record = new Bus();
            $record->bus_code = $request->bus_code;
            $record->save();
            $this->createTwelveSeatsForBus($record->id);
            return response()->json([
                'message' => 'Bus created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * createTwelveSeatsForBus function
     * @method (create twelve seats for every bus aftr create the bus)
     * @param integer $busId
     * @return void
     */
    private function createTwelveSeatsForBus($busId)
    {
        for($i = 0; $i < 12; $i++) {
            $record = new BusSeat();
            $record->bus_id = $busId;
            $record->save();
        }
    }

    /**
     * update function
     * @method (update bus)
     * @link {domain}/bus/update
     * @param Request $request
     * @return object
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'bus_code' => 'required|unique:buses|min:3|max:6',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = Bus::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.$id.' is not fount']);
        }
        try {
            $record->bus_code = $request->bus_code;
            $record->save();
            return response()->json([
                'message' => 'Bus updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete bus)
     * @link {domain}/bus/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = Bus::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'Bus wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'Bus deleted successfully'], 204);
    }

}

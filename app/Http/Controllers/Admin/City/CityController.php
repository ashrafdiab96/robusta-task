<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use \Validator;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * get function
     * @method (get specific city)
     * @link {domain}/city/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = City::where('id', $id)->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all cities)
     * @link {domain}/city/getAll
     * @return object
     */
    public function getAll()
    {
        $record = City::get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get city with paginate)
     * @link {domain}/city/getPaginate
     * @param integer $id
     * @return object
     */
    public function getPaginate()
    {
        $record = City::paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new city)
     * @link {domain}/city/create
     * @param Request $request
     * @return response
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $record = new City();
            $record->name = strtolower($request->name);
            $record->save();
            return response()->json([
                'message' => 'City created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * create function
     * @method (create new city)
     * @link {domain}/city/update
     * @param Request $request
     * @param integer $id
     * @return response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = City::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'City wit id: '.$id.' is not fount']);
        }
        try {
            $record->name = strtolower($request->name);
            $record->save();
            return response()->json([
                'message' => 'City updated successfully',
                'data' => $record
            ], 200);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete city)
     * @link {domain}/city/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = City::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'City wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'City deleted successfully'], 204);
    }

}

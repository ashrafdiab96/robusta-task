<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use \Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * get function
     * @method (get specific user)
     * @link {domain}/user/get
     * @param integer $id
     * @return object
     */
    public function get($id)
    {
        $record = User::where('id', $id)->first();
        return response()->json($record);
    }

    /**
     * getAll function
     * @method (get all users)
     * @link {domain}/user/getAll
     * @return object
     */
    public function getAll()
    {
        $record = User::get();
        return response()->json($record);
    }

    /**
     * getPaginate function
     * @method (get user with paginate)
     * @link {domain}/user/getPaginate
     * @param integer $id
     * @return object
     */
    public function getPaginate()
    {
        $record = User::paginate(20);
        return response()->json($record);
    }

    /**
     * create function
     * @method (create new user)
     * @link {domain}/user/create
     * @param Request $request
     * @return response
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:8|max:60'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $record = new User();
            $record->name = $request->name;
            $record->email = $request->email;
            $record->phone = $request->phone;
            $record->password = Hash::make($request->password);
            $record->save();
            return response()->json([
                'message' => 'User created successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * update function
     * @method (update user)
     * @link {domain}/user/update
     * @param Request $request
     * @return response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = User::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.$id.' is not fount']);
        }
        try {
            $record->name = $request->name;
            $record->email = $request->email;
            $record->phone = $request->phone;
            $record->save();
            return response()->json([
                'message' => 'User updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete user)
     * @link {domain}/user/delete
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $record = User::where('id', $id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.$id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'User deleted successfully'], 204);
    }

}

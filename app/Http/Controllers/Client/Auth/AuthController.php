<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Validator;
use Hash;

class AuthController extends Controller
{
    /**
     * profile function
     * @method (get logged in user profile)
     * @link {domain}/signup
     * @return object
     */
    public function profile()
    {
        $record = User::where('id', Auth::user()->id)->first();
        return response()->json($record);
    }

    /**
     * signup function
     * @method (signup)
     * @link {domain}/signup
     * @param Request $request
     * @return object
     */
    public function signup(Request $request)
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
                'message' => 'You are signed up successfully',
                'data' => $record,
                'token' => $record->createToken("Sanctom")->plainTextToken,
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * login function
     * @method (login)
     * @link {domain}/login
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|max:60'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json(['message' => 'Invalid email or password'], 401);
            }
            $record = User::where('email', $request->email)->first();
            return response()->json([
                'message' => 'You are Logged In Successfully',
                'token' => $record->createToken("Sanctom")->plainTextToken,
            ], 200);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * update function
     * @method (update profile)
     * @link {domain}/profile/update
     * @param Request $request
     * @return object
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = User::where('id', Auth::user()->id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.Auth::user()->id.' is not fount']);
        }
        try {
            $record->name = $request->name;
            $record->email = $request->email;
            $record->phone = $request->phone;
            $record->save();
            return response()->json([
                'message' => 'Your profile updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * updatePassword function
     * @method (update password)
     * @link {domain}/profile/updatePassword
     * @param Request $request
     * @return object
     */
    public function updatePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'password' => 'required|min:8|max:60',
        ]);
        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $record = User::where('id', Auth::user()->id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.Auth::user()->id.' is not fount']);
        }
        try {
            $record->password = Hash::make($request->password);
            $record->save();
            return response()->json([
                'message' => 'Your password updated successfully',
                'data' => $record
            ], 201);

        } catch(\Exception $error) {
            return response()->json(['message' => 'Internal server error: '. $error->getMessage()]);
        }
    }

    /**
     * delete function
     * @method (delete profile)
     * @link {domain}/profile/delete
     * @param Request $request
     * @return object
     */
    public function delete()
    {
        $record = User::where('id', Auth::user()->id)->first();
        if (!$record) {
            return response()->json(['message' => 'User wit id: '.Auth::user()->id.' is not fount']);
        }
        $record->delete();
        return response()->json(['message' => 'User deleted successfully'], 204);
    }

}

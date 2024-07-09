<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'comfirm_password'=>'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=> false,
                'massage'=>'Ada Kesalahan',
                'data'=> $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name' ] = $user->name;

        return response()->json([
            'success'=> true,
            'massage'=>'Sukses Melakukan Register',
            'data'=> $success
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;


            return response()->json([
                'success'=> true,
                'massage'=>'Login Sukses',
                'data'=> $success
            ]);
        }
        else {
            return response()->json([
                'success'=> false,
                'massage'=>'Periksa Email dan Password Lagi',
                'data'=> null
            ]);
        }
    }
}

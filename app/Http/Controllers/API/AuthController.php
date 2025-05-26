<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd(get_class_methods(\App\Models\User::class));
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $auth = Auth::user();
            // $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            // $success['name'] = $auth->name;
            // $success['username'] = $auth->username;
            $roles = config('kode.roles');
            $rs = config('kode.rs');

            return response()->json([
                'success' => true,
                'message' => 'Login sukses',
                'token' => $auth->createToken('auth_token')->plainTextToken,
                'data' => [
                    'user' => $auth,
                    'roles' => $roles[$auth->kode_role] ?? 'Unknown Role',
                    'rs' => $rs[$auth->kode_rs] ?? 'Unknown RS',
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek username dan password lagi',
                'data' => null
            ]);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Sukses register',
            'data' => $success
        ]);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        $roles = config('kode.roles');
        $rs = config('kode.rs');

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'roles' => $roles[$user->kode_role] ?? 'Unknown Role',
                'rs' => $rs[$user->kode_rs] ?? 'Unknown RS',
            ]
        ]);
    }
}

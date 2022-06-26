<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json([
                    'message' => 'Login failed'
                ], 401);
        }

        $user = User::where('email', $request['email'])->first();
        
        $token = $user->createToken('token')->plainTextToken;

        return response()
            ->json([
                'message' => 'Login success, Hi '.$user->name.',',
                'data' => $user,
                'access_token' => $token, 
                'token_type' => 'Bearer'
            ], 200);
    }

    public function dashboard ()
    {
        $data = User::all();

        if ($data) {
            return APIFormatter::createApi(200, 'Success', $data);
        } else {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

    public function profile (Request $request)
    {
        return response()
            ->json([
                'data' => auth()->user(),
            ], 200);
    }

    public function logout(Request $request)
    {
        
        $user = $request->user();
        $user->tokens()->delete();
        return response()
            ->json([
                'message' => 'You have successfully logged out and the token was successfully deleted'
            ], 200);
    }
}

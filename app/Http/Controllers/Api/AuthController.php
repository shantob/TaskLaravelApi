<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function logout(Request $request) {
    //     $request->user()->tokens()->delete();
    //     return response()->json([
    //         'message' => 'Logout Successfully',
    //     ], 200);
    // }

    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request, 'password' => $request->password])) {
            $user = Auth::user();
            $success['name'] = $user->name;
            return response()->json([
                'status'=>true,
                'message'=>'User Login Successfiully',
                'token'=> $user->createToken("API TOKEN")->plainTextToken
            ],200);
        } return response()->json([
            'status' => false,
            'message' => 'Wrong Information'
        ], 500);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed'],
            ]);
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'User Create Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
    public function logout()
    {
        if(!auth()->check()){
            return response()->json([
                'status' => false,
                'message' => 'You are not logged in!'
            ], 401);
        }

       try{
        
        auth()->user()->tokens()->delete();
        return response()->json([ 
            'message' => 'Successfully logged out' 
        ],200);

       }
       
       catch (\Throwable $th) {

        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}

}

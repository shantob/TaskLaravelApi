<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = User::all();
        return response()->json([
            'status' => true,
            'data' => $profiles
        ], 200);
    }
    public function show($id)
    {
        $user =  User::find($id);
        return response()->json([
            'status' => true,
            'data' => $user
        ], 200);
    }
    public function store(ProfileRequest $request)
    {
        // dd($request->file('image')->getClientOriginalExtension());

        try {
            $fileName = date('y-m-d') . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();


            $user = Auth::user();
            //$user = User::orderBy('id', 'asc')->take(1);
            $request->file('image')->move(storage_path('/app/public/profiles'), $fileName);
            //dd($fileName);
            $data = [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'lust_name' => $request->lust_name,
                'address' => $request->address,
                'image' => $fileName,
            ];

            Profile::create($data);
            return response()->json([
                'status' => true,
                'message' => 'Profile Create Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

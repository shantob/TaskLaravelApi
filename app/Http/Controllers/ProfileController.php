<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $profiles = User::all();
        return view('dashboard', compact('profiles'));
    }
    public function show($id)
    {  
        $user =  User::find($id);
        //dd($user);
        return view('profile_show', compact('user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('compleate_profile', compact('user'));
    }
    public function store(ProfileRequest $request)
    {
        // dd($request->file('image')->getClientOriginalExtension());

        $fileName = date('y-m-d') . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();


        $user = Auth::user();
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

        return Redirect::route('dashboard')->with('success', 'Profile create successfully');
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::find(1);
        $user->update(['name' => 5]);

        //////////////////////////////

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

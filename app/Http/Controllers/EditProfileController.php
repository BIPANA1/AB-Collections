<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('user.editProfile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Customize image validation as needed
            'password' => 'nullable|string|min:8|confirmed',
            'address' => 'required|string|max:255', // Add address validation rule
            'phone' => 'required|string|max:20',
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
            Log::info('Avatar Path: ' .$avatarPath);
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->update();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function viewProfile()
    {
        $user = User::all();
        return view('user.viewProfile',compact('user'));
    
    }

    /**
     * Display the specified resource.
     */
}

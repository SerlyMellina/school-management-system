<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        // dd($user);
        return view('admin.profile.index', compact('user'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // dd($user);
        return view('admin.profile.index', compact('id', 'user'));
    } // End Profile

    public function editprofile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }

    public function simpanprofile(Request $request)
    {

        $user = new User();

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_images')) {
            $gambar = $request->file('profile_images');
            $format = now()->format('YmdHis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/profile'), $format);
            $user->profile_images = $format;
        }

        $user->save();

        return redirect()->route('v_profile')->with('status', 'Profile Berhasil di Update!');
    }
}

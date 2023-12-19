<?php

namespace App\Http\Controllers;

use App\User;
use App\Roleakses;
use Illuminate\Http\Request;


class RoleaksesController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        return view('admin.roleakses.index', compact('user'));
    }

    public function delete(string$id)
    {
        $user=User::find($id);
        $user->delete();
        return back();
    }

    public function store(Request$request)
    {
        $data = new User();
        $data->nama = $request->input('nama');
        $data->roleakses = $request->input('usertype');
        $data->save();
    }
    
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class RoleaksesController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        return view('admin.roleakses.index', compact('user'));
    }
}

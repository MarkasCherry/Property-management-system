<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:createAdministrators, App\Models\User')->only('create');
        $this->middleware('can:viewAdministrators, App\Models\User')->only('index');
        $this->middleware('can:editAdministrators, App\Models\User')->only('edit');
    }

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
}

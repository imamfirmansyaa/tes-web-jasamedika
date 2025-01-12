<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'no_sim' => 'required',
            'password' => 'required|same:confirm-passwordred',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
}

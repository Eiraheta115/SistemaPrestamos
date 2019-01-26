<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserControl extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
}

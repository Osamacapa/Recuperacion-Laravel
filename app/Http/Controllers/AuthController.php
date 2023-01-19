<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (Request $request){
        $creentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($creentials)){
            return response()->json(['error' => 'Unauthorized'],401);
        }

        return response()->json(['acces_token' => $token]);
    }   
}

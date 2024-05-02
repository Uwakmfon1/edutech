<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:email'],
            'password' => ['required','string','min:8'],
        ]);



        if ($validator->fails()) {
            return response()->json([
                'message'=>'validation failed',
            ],422);

        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' =>$request->password,
        ]);

            return response()->json([
                'message'=>'registration successful'
            ],200);

    }
}

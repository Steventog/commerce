<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function register(){
        return view('user.register');
    }

    public function store (AuthRequest $request){

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required',
        // ]);



        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);




            if ($user->save()) {
                 return redirect()->back()->with('success', 'Votre compte a été créé avec succès!');


                // return response()->json([
                //     'status' =>201,
                //     'message' =>"Uilisateur créé avec succès",
                // ]);
            }

        } catch (Exception $e)
        {

            dd($e);
            //throw $th;
        }

    }
}

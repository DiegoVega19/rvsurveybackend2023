<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function registerInterviewer(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'isAdmin' => 'required|boolean',
            

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        Interviewer::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => $request->isAdmin,
            'isEnabled' => true,
        ]);

        return response()->json([
            'message' => 'Successfully created Interviewer!'
        ], 201);
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);


        $user = $request->user();
        $email = $request->email;
        //Obtenemos el usuario segun su email para retornarlo
      $interviewer = Interviewer::select("*")
      ->where("email", "=", $email)
      ->get();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
            'user' => $interviewer
        ]);
    }

    


    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

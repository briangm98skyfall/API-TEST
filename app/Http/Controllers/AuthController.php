<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use PhpParser\Parser\Tokens;

class AuthController extends Controller
{


    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user, 'acces_token'=>$token, 'token_type'=> 'Bearer']);
    }


    public function login(Request $request){


        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['msg' => 'Sin acceso'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'msg' => 'Hola '.$user->name,
            'accesToken' => $token,
            'tokenType' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout(){

        auth()->user()->tokens()->delete();

        return [
            'msg' => 'Usuario desautenticado correctamente'
        ];
    }
}

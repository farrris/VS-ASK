<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Неверная попытка входа. Попробуйте ещё раз'], 401);
        }

        $user = Auth::user();
        $user->token = $this->respondWithToken($token)->original["access_token"];

        return $user;
    }

    public function registration(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:7'
        ]);
        $login = request('login');
        $email = request('email');
        $password = request('password');

        $user = new User();
        $user->login = $login;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return response()->json(['message' => 'Successfully registration!']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 86400
        ]);
    }
}

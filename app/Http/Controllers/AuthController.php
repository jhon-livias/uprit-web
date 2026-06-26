<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    // Mostrar login
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $token = $user->createToken('api-token')->plainTextToken;

        session(['sanctum_token' => $token]);

        return redirect()->route('admin.home');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            LoginLog::create([
                'email' => $request->email,
                'ip_address' => $request->ip(),
                'success' => false,
                'message' => 'Usuario no encontrado'
            ]);

            return back()->withErrors([
                'email' => 'Credenciales incorrectas'
            ]);
        }

        if (!$user->is_active) {

            LoginLog::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'ip_address' => $request->ip(),
                'success' => false,
                'message' => 'Usuario inactivo'
            ]);

            return back()->withErrors([
                'email' => 'Usuario suspendido'
            ]);
        }

        if ($user->locked_until && now()->lt($user->locked_until)) {

            $minutes = now()->diffInMinutes($user->locked_until);

            LoginLog::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'ip_address' => $request->ip(),
                'success' => false,
                'message' => 'Usuario bloqueado temporalmente'
            ]);

            return back()->withErrors([
                'email' => "Cuenta bloqueada. Intente nuevamente en {$minutes} minutos."
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {

            $user->failed_login_attempts += 1;

            if ($user->failed_login_attempts >= 3) {

                $user->locked_until = now()->addMinutes(30);

                $user->failed_login_attempts = 0;
            }

            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();

            LoginLog::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'ip_address' => $request->ip(),
                'success' => false,
                'message' => 'Password incorrecto'
            ]);

            return back()->withErrors([
                'email' => 'Credenciales incorrectas'
            ]);
        }

        $user->failed_login_attempts = 0;
        $user->locked_until = null;
        $user->save();

        Auth::login($user);

        $token = $user->createToken('api-token')->plainTextToken;

        session([
            'sanctum_token' => $token
        ]);

        LoginLog::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'ip_address' => $request->ip(),
            'success' => true,
            'message' => 'Login exitoso'
        ]);

        return redirect()->route('admin.home');
    }

    // Dashboard estático
    public function inicio()
    {
        return view('admin.pages.inicio');
    }



    // Logout
    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('administrador.login');
    }
}

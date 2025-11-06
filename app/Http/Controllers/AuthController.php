<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Maneja el intento de inicio de sesión.
     */
    public function log_in(Request $request): RedirectResponse
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar con las credenciales
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // genera una nueva sesión segura
            return redirect()->intended('/'); // redirige al dashboard o a la ruta anterior
        }

        // Si las credenciales no son válidas
        return back()->withErrors([
            'email' => 'El correo o la contraseña no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // cierra sesión
        $request->session()->invalidate(); // invalida la sesión actual
        $request->session()->regenerateToken(); // regenera el token CSRF

        return redirect('/login'); // redirige al login
    }
}

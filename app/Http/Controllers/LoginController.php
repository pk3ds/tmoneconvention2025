<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'staff_id' => ['required', 'string'],
            'password' => ['nullable', 'string'],
        ]);

        $user = User::where('staff_id', $request->staff_id)->first();

        if (!$user) {
            return back()->withErrors([
                'staff_id' => 'The provided credentials do not match our records.',
            ]);
        } else if ($user && !$user->use_password) {
            Auth::attempt([
                'staff_id' => $request->staff_id,
                'password' => 'password'
            ]);
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        } else if ($user && $user->use_password && !$request->password) {
            return redirect()->route('login', ['password' => true])->withErrors([
                'staff_id' => 'Your account require a password.',
            ]);
        } else if ($user && $user->use_password && $request->password) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                return back()->withErrors([
                    'staff_id' => 'The provided credentials do not match our records.',
                ]);
            }
        }
    }
}

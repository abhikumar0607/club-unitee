<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        // CUSTOMER BUT NOT APPROVED
        if ($user->role === 'customer' && $user->is_approved !== 'approved') {

            Auth::logout(); // logout immediately

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Your profile is under review. Please wait for admin approval.',
                ]);
        }

        // regenerate session only if allowed
        $request->session()->regenerate();

        // ADMIN
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // CUSTOMER + APPROVED
        if ($user->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

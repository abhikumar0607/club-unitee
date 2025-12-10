<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'profession' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
            'referral_source' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_handle' => ['nullable', 'string', 'max:255'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'profession' => $request->profession,
            'organization' => $request->organization,
            'bio' => $request->bio,
            'referral_source' => $request->referral_source,
            'linkedin_url' => $request->linkedin_url,
            'instagram_handle' => $request->instagram_handle,
            'password' => Hash::make(12345678),
            'role' => 'customer',
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect(route('customer.dashboard.profile', absolute: false));
    }
}

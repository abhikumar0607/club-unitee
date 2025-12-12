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
use App\Models\GolfProfile;
use App\Models\UserMatchingPreference;
use App\Models\UserAvailability;
use Illuminate\Support\Facades\DB;

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
            'skill_level'           => 'required',
            'fitness_level'         => 'required',
            'course_play_preference'=> 'required',
            'availability'          => 'required',
            'preferred_connection'  => 'required',
            'travel_radius'         => 'required',
        ]);

        DB::beginTransaction();  

        try {

            // Create User
            $user = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'profession'        => $request->profession,
                'organization'      => $request->organization,
                'bio'               => $request->bio,
                'referral_source'   => $request->referral_source,
                'linkedin_url'      => $request->linkedin_url,
                'instagram_handle'  => $request->instagram_handle,
                'password'          => Hash::make(12345678),
                'role'              => 'customer',
            ]);

            // Golf Profile
            GolfProfile::create([
                'user_id'               => $user->id,
                'skill_level'           => $request->skill_level,
                'fitness_level'         => $request->fitness_level,
                'handicap'              => $request->handicap,
                'course_play_preference'=> $request->course_play_preference,
                'top_facilities'        => $request->top_facilities,
                'most_used_courses'     => $request->most_used_courses,
            ]);

            //  User Availability
            UserAvailability::create([
                'user_id'               => $user->id,
                'availability'          => $request->availability,
                'looking_for'           => $request->looking_for,
                'preferred_connection'  => $request->preferred_connection,
            ]);

            // Matching Preferences
            UserMatchingPreference::create([
                'user_id'                   => $user->id,
                'play_style'                => $request->play_style,
                'travel_radius'             => $request->travel_radius,
                'handicafe_prefernce'       => $request->handicafe_prefernce,
                'fitness_level_prefernce'   => $request->fitness_level_prefernce,
                'availability_prefernce'    => $request->availability_prefernce,
                'looking_for_prefernce'     => $request->looking_for_prefernce,
                'skill_level_prefernce'     => $request->skill_level_prefernce,
                'course_play_prefernce'     => $request->course_play_prefernce,
                'intrest_prefrence'         => $request->intrest_prefrence,
            ]);

            DB::commit();
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('customer.dashboard.profile');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}

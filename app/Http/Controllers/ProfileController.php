<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'profile Updated Successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        \DB::table('golf_profiles')->where('user_id', $user->id)->delete();
        \DB::table('user_availability')->where('user_id', $user->id)->delete();
        \DB::table('user_matching_preffrence')->where('user_id', $user->id)->delete();
        \DB::table('event_rsvps')->where('user_id', $user->id)->delete();
        \DB::table('events')->where('user_id', $user->id)->delete();
        \DB::table('connection_requests')->where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->delete();
        \DB::table('blogs')->where('user_id', $user->id)->delete();
        \DB::table('blog_categories')->where('user_id', $user->id)->delete();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index(Request $request, $id = null)
    {
        $previousUrl = url()->previous();

        if (str_contains($previousUrl, 'applications')) {
            session(['profile_from' => 'applications']);
        } elseif (str_contains($previousUrl, 'members')) {
            session(['profile_from' => 'members']);
        } elseif (str_contains($previousUrl, 'connection')) {
            session(['profile_from' => 'connection']);
        }

        if ($id) {
            $user = User::find($id);
        } else {
            $user = $request->user();   
        }
        return view('profile.index', compact('user'));
    }
}

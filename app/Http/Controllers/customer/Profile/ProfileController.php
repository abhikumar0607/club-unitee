<?php

namespace App\Http\Controllers\customer\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Customer\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    
    //function for profile
    public function index(){
        $user = $this->profileService->getUserProfile();
        return view('customer.profile.index', compact('user'));
    }

    //function for edit profile
    public function edit(){
        $user = $this->profileService->getUserProfile();
        return view('customer.profile.edit-profile', compact('user'));
    }

    //function for update profile
    public function update(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'bio' => ['required', 'string'],

            'referral_source' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_handle' => ['nullable', 'string', 'max:255'],

            // Golf profile
            'skill_level'            => 'required',
            'fitness_level'          => 'required',
            'course_play_preference' => 'required',

            // Availability
            'availability'           => 'required',
            'preferred_connection'   => 'required',

            // Matching
            'travel_radius'          => 'required',
        ]);

        $this->profileService->updateUserProfile($request);
        return redirect()->route('customer.dashboard.profile')->with('success', 'Profile updated successfully');
    }


    //function for delete account
    public function deleteAccount(){
        $this->profileService->deleteAccount();
        return redirect()->route('login')->with('success', 'Account deleted successfully');
    }
}

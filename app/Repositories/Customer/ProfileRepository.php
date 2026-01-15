<?php

namespace App\Repositories\Customer;
use App\Traits\HandlesFileUpload;

use App\Models\user;

class ProfileRepository
{
    use HandlesFileUpload;
    public function getUserProfile()
    {
        $user = auth()->user()->id;

        return User::with('usermatchingPreference', 'useravailability', 'golfProfile')->find($user);
    }

    public function updateUserProfile($request)
    {
        $user = auth()->user();
        // profile image upload
        $filename = $user->profile_image ?? null;
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                $this->deleteImage($user->profile_image, 'assets/customer/uploads/profile');
            }

            $filename = $this->uploadImage(
                $request->file('profile_image'),
                'assets/customer/uploads/profile'
            );
        }


        // Update main user fields
        $user->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'organization' => $request->organization,
            'bio' => $request->bio,
            'referral_source' => $request->referral_source,
            'member_name' => $request->member_name,
            'linkedin_url' => $request->linkedin_url,
            'instagram_handle' => $request->instagram_handle,
            'profile_image' => $filename,
        ]);

        // Update or Create Golf Profile
        $user->golfProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'skill_level' => $request->skill_level,
                'fitness_level' => $request->fitness_level,
                'handicap' => $request->handicap,
                'course_play_preference' => $request->course_play_preference,
                'top_facilities' => $request->top_facilities,
                'most_used_courses' => $request->most_used_courses,
            ]
        );

        // Update or Create Availability
        $user->useravailability()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'availability' => $request->availability,
                'looking_for' => $request->looking_for,
                'preferred_connection' => $request->preferred_connection,
            ]
        );

        // Update or Create Matching Preferences
        $user->usermatchingPreference()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'play_style' => $request->play_style,
                'travel_radius' => $request->travel_radius,
                'handicafe_prefernce' => $request->handicafe_prefernce,
                'fitness_level_prefernce' => $request->fitness_level_prefernce,
                'availability_prefernce' => $request->availability_prefernce,
                'looking_for_prefernce' => $request->looking_for_prefernce,
                'course_play_prefernce' => $request->course_play_prefernce,
                'skill_level_prefernce' => $request->skill_level_prefernce,
                'intrest_prefrence' => $request->intrest_prefrence,
            ]
        );

        return $user->load('golfProfile', 'useravailability', 'usermatchingPreference');
    }

    //delete account
    public function deleteAccount()
    {
        $user = auth()->user();
        //delete all related data
        $user->golfProfile()->delete();
        $user->useravailability()->delete();
        $user->usermatchingPreference()->delete();
        $user->friendships()->delete();
        //delete user
        $user->delete();
    }
}

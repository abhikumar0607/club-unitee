<?php
namespace App\Services\Customer;

use App\Repositories\Customer\ConnectionRepository;

class ConnectionService
{
    protected $repo;

    public function __construct(ConnectionRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAllConnections()
    {
        $currentUser = auth()->user();

        // Get logged-in user preferences
        $my = $this->repo->getCurrnetUserWithPreference($currentUser->id);

        if (!$my || !$my->usermatchingPreference) {
            return collect();
        }

        // Convert my preference fields into variables
        $myPref = $my->usermatchingPreference;

        // Fetch all other users
        $users = $this->repo->getOtherActiveUsers($currentUser->id);
        $matched = collect();
        foreach ($users as $user) {

            if (!$user->usermatchingPreference) {
                continue;
            }

            $pref = $user->usermatchingPreference;

            // simple match counter
            $matchCount = 0;

            if ($myPref->play_style == $pref->play_style) $matchCount++;
            if ($myPref->travel_radius == $pref->travel_radius) $matchCount++;
            if ($myPref->handicafe_prefernce == $pref->handicafe_prefernce) $matchCount++;
            if ($myPref->fitness_level_prefernce == $pref->fitness_level_prefernce) $matchCount++;
            if ($myPref->availability_prefernce == $pref->availability_prefernce) $matchCount++;
            if ($myPref->looking_for_prefernce == $pref->looking_for_prefernce) $matchCount++;
            if ($myPref->skill_level_prefernce == $pref->skill_level_prefernce) $matchCount++;
            if ($myPref->course_play_prefernce == $pref->course_play_prefernce) $matchCount++;
            if ($myPref->intrest_prefrence == $pref->intrest_prefrence) $matchCount++;

            // Minimum 3 matched
            if ($matchCount >= 3) {
                $matched->push($user);
            }
        }

        return $matched;
    }

    public function isRequestSent(){
       return $this->repo->isRequestSent();
    }

    public function isRequestReceived(){
        return $this->repo->isRequestReceived();
    }

    public function isRequestAccepted(){
        return $this->repo->isRequestAccepted();
    }

    //function for connection request
    public function sendConnectionRequest($receiverId){
       return $this->repo->sendConnectionRequest($receiverId);
    }

    //function for get sent connection requests
    public function getSentConnectionRequests(){
       return $this->repo->getSentConnectionRequests();
    }

    //funtion for remove connection request
    public function getReceivedConnectionRequests(){
        return $this->repo->getReceivedConnectionRequests();
    }

    //funtion for remove connection request
    public function cancelConnectionRequest($requestId){
        return $this->repo->cancelConnectionRequest($requestId);
    }

    //funtion for accept connection request
    public function acceptConnectionRequest($requestId){
       return $this->repo->acceptConnectionRequest($requestId);
    }

}

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

    //function for test
    public function test(){
       
    }
    
    public function getAllConnections()
    {
        $me = auth()->user();

        $my = $this->repo->getCurrnetUserWithPreference($me->id);
        if (!$my || !$my->usermatchingPreference) {
            return collect();
        }

        $myPref = $my->usermatchingPreference;

        // exclude already connected users
        $excludedIds = $this->repo->getExcludedUserIds($me->id);

        $users = $this->repo
            ->getOtherActiveUsers($me->id)
            ->whereNotIn('id', $excludedIds);

        $matched = collect();

        foreach ($users as $user) {

            if (!$user->usermatchingPreference) continue;

            $pref = $user->usermatchingPreference;
            $count = 0;

            if ($myPref->play_style == $pref->play_style) $count++;
            if ($myPref->travel_radius == $pref->travel_radius) $count++;
            if ($myPref->handicafe_prefernce == $pref->handicafe_prefernce) $count++;
            if ($myPref->fitness_level_prefernce == $pref->fitness_level_prefernce) $count++;
            if ($myPref->availability_prefernce == $pref->availability_prefernce) $count++;
            if ($myPref->looking_for_prefernce == $pref->looking_for_prefernce) $count++;
            if ($myPref->skill_level_prefernce == $pref->skill_level_prefernce) $count++;
            if ($myPref->course_play_prefernce == $pref->course_play_prefernce) $count++;
            if ($myPref->intrest_prefrence == $pref->intrest_prefrence) $count++;

            // minimum 3 match
            if ($count >= 3) {
                $matched->push($user);
            }
        }

        return $matched;
    }

    public function getMyConnections(){
        return $this->repo->getMyConnections(auth()->user()->id);
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

<?php
namespace App\Services\Customer;

use App\Repositories\Customer\ProfileRepository;

class ProfileService
{
    protected $repo;

    public function __construct(ProfileRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getUserProfile()
    {
        return $this->repo->getUserProfile();
    }

    public function updateUserProfile($request)
    {
        return $this->repo->updateUserProfile($request);
    }

    //function for delete account
    public function deleteAccount()
    {
        return $this->repo->deleteAccount();
    }
}
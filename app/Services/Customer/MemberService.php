<?php
 
namespace App\Services\Customer;
use App\Repositories\Customer\MemberRepository;
class MemberService
{
    protected $memberRepository;
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }
   
    //function for get all members
    public function getAllMembers($request){
        $query = $this->memberRepository->getAllMembers();

         // SEARCH
        if ($request->filled('search')) {
            $query->whereAny(
                ['name', 'email', 'profession'],
                'like',
                "%{$request->search}%"
            );
        }

       // golf skill level filter
        if ($request->filled('golf_skill_level')) {
            $query->whereHas('golfProfile', function ($q) use ($request) {
                $q->where('skill_level', $request->golf_skill_level);
            });
        }


        // availability filter
        if ($request->filled('availability')) {
            $query->whereHas('useravailability', function ($q) use ($request) {
                $q->where('availability', $request->availability);
            });
        }

        return $query->paginate(10)->withQueryString();
       
    }
}
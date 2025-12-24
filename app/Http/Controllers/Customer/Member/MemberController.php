<?php

namespace App\Http\Controllers\Customer\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Customer\MemberService;

class MemberController extends Controller
{
    protected $memberService;
    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }
    //function for member
    public function index(Request $request){
        $members = $this->memberService->getAllMembers($request);
        return view('customer.member.index', compact('members'));
    }
}

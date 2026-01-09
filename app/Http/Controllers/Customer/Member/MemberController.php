<?php

namespace App\Http\Controllers\Customer\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Customer\MemberService;
use App\Services\Customer\ConnectionService;

class MemberController extends Controller
{
    protected $memberService;
    protected $connService;
    public function __construct(MemberService $memberService, ConnectionService $connService)
    {
        $this->memberService = $memberService;
        $this->connService = $connService;
    }
    //function for member
    public function index(Request $request){
        // $members = $this->memberService->getAllMembers($request);
        $matched_connections = $this->connService->getAllConnections($request);
        return view('customer.member.index', compact('matched_connections'));
    }
}

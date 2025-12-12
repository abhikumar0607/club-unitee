<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\MemberService;

class MemberController extends Controller
{
    protected $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    // Show list of all customers
    public function index(Request $request)
    {
        $members = $this->memberService->getAllMembers($request);
        return view('admin.members.index', compact('members'));
    }
}

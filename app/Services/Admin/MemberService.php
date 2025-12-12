<?php

namespace App\Services\Admin;

use App\Repositories\Admin\MemberRepository;

class MemberService
{
    protected $memberRepo;

    public function __construct(MemberRepository $memberRepo)
    {
        $this->memberRepo = $memberRepo;
    }

    public function getAllMembers($request)
    {
        $query = $this->memberRepo->getAllMembers();
        // SEARCH
        if ($request->filled('search')) {
            $query->whereAny(
                ['name', 'email', 'profession'],
                'like',
                "%{$request->search}%"
            );
        }

        // STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // SORTING
        switch ($request->sort) {
            case 'oldest':
                $query->orderBy('id', 'ASC');
                break;
            case 'az':
                $query->orderBy('name', 'ASC');
                break;
            case 'za':
                $query->orderBy('name', 'DESC');
                break;
            default:
                $query->orderBy('id', 'DESC');
        }

        return $query->paginate(10)->withQueryString();
    }
}

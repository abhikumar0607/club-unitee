<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ChatUnreadCounter extends Component
{
    public $groupIds;

    public function __construct()
    {
        $this->groupIds = Auth::check()
            ? Auth::user()
                ->groups()
                ->withCount('users')
                ->get()
            : collect();
    }

    public function render()
    {
        return view('components.chat-unread-counter');
    }
}

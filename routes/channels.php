<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Group;

Broadcast::channel('chat.{id}', function ($user, $id) {

    // 🔹 1–1 private chat (user apna channel join kare)
    if ((int) $user->id === (int) $id) {
        return true;
    }

    // 🔹 group chat (user group ka member ho)
    return Group::where('id', $id)
        ->whereHas('users', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->exists();
});

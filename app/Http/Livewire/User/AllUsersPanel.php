<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\UserInformation;

class AllUsersPanel extends Component
{

    public function render()
    {
        $users = UserInformation::all();
        return view('livewire.user.all-users-panel', ['users' => $users])->layout('layouts.app');
    }
}

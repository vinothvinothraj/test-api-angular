<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserInformation;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    use InteractsWithBanner;
    public $showDeleteModal;

    public $showModal;
    public $selectedUser;

    public function viewUser($id){
        $this->selectedUser = UserInformation::find($id);
        if ($this->selectedUser) {
            $this->showModal = true; 
        }
    }

    public function closeModal(){
        $this->showModal = false; 
    }

    public function confirmDelete($id)
    {
        $id = $id + 1 ;
        $this->selectedUser = User::find($id);
        $this->showDeleteModal = true;
    }

    
    public function deleteUser()
    {
        if ($this->selectedUser) {
            $this->selectedUser->delete();
        }
        $this->banner('User deleted successfully.');
        $this->showDeleteModal = false;
    }

    public function render()
    {
        $users = UserInformation::all();
        return view('livewire.user.user-index', ['users' => $users])->layout('layouts.app');
    }
}

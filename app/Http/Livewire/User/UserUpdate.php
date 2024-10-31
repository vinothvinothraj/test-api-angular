<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserInformation;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;

class UserUpdate extends Component
{

    use InteractsWithBanner;
    public $first_name;
    public $last_name;
    public $email;

    public $nic_id;
    public $gender;
    public $user_type;
    public $address;
    public $phone;
    public $userId;

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nic_id' => 'string|max:20|unique:user_information,nic_id,' . $this->userId,
            'gender' => 'required|string|in:male,female,other',
            'user_type' => 'required|string|in:admin,SE,ASE,INTERN,SUPPORT-STAFF',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ];
    }


    public function mount($id)
    {

        $user = UserInformation::findOrFail($id);
        $this->userId = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->nic_id = $user->nic_id;
        $this->gender = $user->gender;
        $this->user_type = $user->user_type;
        $this->address = $user->address;
        $this->phone = $user->phone;
    }

    public function updateUser()
    {
        $this->validate();


        $userInformation = UserInformation::findOrFail($this->userId);
        $userInformation->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'nic_id' => $this->nic_id,
            'gender' => $this->gender,
            'user_type' => $this->user_type,
            'address' => $this->address,
            'phone' => $this->phone,
        ]);

        $user = User::findOrFail($userInformation->user_id);
        $user->update([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');
        return redirect()->route('admin.user.index');
    }

    public function goBack()
    {
        return redirect('/admin/users');
    }

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->nic_id = '';
        $this->gender = '';
        $this->user_type = '';
        $this->address = '';
        $this->phone = '';

        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.user.user-update')->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\InteractsWithBanner;

class UserCreate extends Component
{

    use InteractsWithBanner;

    use WithFileUploads;

    
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    public $nic_id;
    public $gender;
    public $user_type;
    public $address;
    public $phone;
    public $profileImage;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'confirm_password' => 'required|string|min:8|same:password',
        'nic_id' => 'required|string|max:20|unique:user_information,nic_id',
        'gender' => 'required|string|in:male,female,other',
        'user_type' => 'required|string|in:admin,SE,ASE,INTERN,SUPPORT-STAFF',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'profileImage' => 'nullable|image|max:5120',
    ];

    public function createUser()
    {
        $this->validate();

        $profileImagePath = $this->profileImage ? $this->profileImage->store('profile-images', 'public') : null;

        $user = User::create([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'email_verified_at' => now(),
        ]);

        UserInformation::create([
            'user_id' => $user->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'nic_id' => $this->nic_id,
            'gender' => $this->gender,
            'user_type' => $this->user_type,
            'address' => $this->address,
            'phone' => $this->phone,
            'profile_image' => $profileImagePath,
        ]);

        $this->banner('User Created Successfully');
        $this->resetForm();
        return redirect('/admin/users');
   
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
        $this->password = '';
        $this->confirm_password = '';
        $this->nic_id = '';
        $this->gender = '';
        $this->user_type = '';
        $this->address = '';
        $this->phone = '';
        $this->profileImage = '';
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.user.user-create')->layout('layouts.app');
    }
}

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-white dark:bg-bgblack text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-bgblack max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 rounded-md mt-8">
        <form wire:submit.prevent="submitForm">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <x-label for="first_name" value="{{ __('First Name') }}" />
                    <x-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name" autocomplete="first_name" />
                    <x-input-error for="first_name" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name" autocomplete="last_name" />
                    <x-input-error for="last_name" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" autocomplete="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input id="phone" type="number" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
                    <x-input-error for="phone" class="mt-2" />
                </div>

                

                <div class="col-span-1">
                    <x-label for="nic_id" value="{{ __('NIC ID') }}" />
                    <x-input id="nic_id" type="text" class="mt-1 block w-full" wire:model.defer="nic_id" autocomplete="nic_id" />
                    <x-input-error for="nic_id" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="user_type" value="{{ __('User Type') }}" />
                    <x-select id="user_type" class="mt-1 block w-full" wire:model.defer="user_type">
                        <option value="">Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="SE">Software Engineer</option>
                        <option value="ASE">Associate Software Engineer</option>
                        <option value="INTERN">Intern</option>
                        <option value="SUPPORT-STAFF">Support Staff</option>
                    </x-select>
                    <x-input-error for="user_type" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <x-select id="gender" class="mt-1 block w-full" wire:model.defer="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </x-select>
                    <x-input-error for="gender" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="profileImage" value="{{ __('Profile Image') }}" />
                    <input id="profileImage" type="file" wire:model="profileImage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <x-input-error for="profileImage" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" autocomplete="new-password" />
                    <x-input-error for="password" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="confirm_password" value="{{ __('Confirm Password') }}" />
                    <x-input id="confirm_password" type="password" class="mt-1 block w-full" wire:model.defer="confirm_password" autocomplete="confirm-password" />
                    <x-input-error for="confirm_password" class="mt-2" />
                </div>

                <div class="col-span-2">
                    <x-label for="address" value="{{ __('Address') }}" />
                    <x-textarea id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" autocomplete="address" />
                    <x-input-error for="address" class="mt-2" />
                </div>

                
            </div>

            <div class="flex justify-between mt-6">
                <x-button wire:click="goBack" type="button">
                    {{ __('Back') }}
                </x-button>

                <div class="flex gap-4">
                    <x-button wire:click="resetForm" type="button">
                        {{ __('Reset') }}
                    </x-button>

                    <x-button class="bg-green-500 dark:bg-yellow text-white dark:text-darkblue" type="button" wire:click="createUser">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</div>

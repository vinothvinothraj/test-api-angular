<div class="p-8">

    <div class="text-gray-700 dark:text-gray-200 pb-4">
        <h2 class="text-xl font-semibold">Active Users</h2>
        <hr class="border-gray-200 dark:border-gray-700">
    </div>
    
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
        @foreach($users as $user)
        <a
        href="#"
        class="relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8 shadow-2xl"
        >
        <span
            class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
        ></span>

        <div class="sm:flex sm:justify-between sm:gap-4">
            <div>
            <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                {{$user->first_name}} {{$user->last_name}}
            </h3>

            <p class="mt-1 text-xs font-medium text-gray-600">{{$user->user_type}}</p>
            </div>

            <div class="hidden sm:block sm:shrink-0">
            <img
                alt=""
                src="{{ Storage::url($user->profile_image) }}"
                class="size-16 rounded-lg object-cover shadow-sm"
            />
            </div>
        </div>

        <div class="mt-4">
            <p class="text-pretty text-sm text-gray-500">
            {{$user->address}}
            </p>
        </div>

        <dl class="mt-6 flex gap-4 sm:gap-6">
            <div class="flex flex-col-reverse">
            <dt class="text-sm font-medium text-gray-600">Email</dt>
            <dd class="text-xs text-gray-500">{{$user->email}}</dd>
            </div>

            <div class="flex flex-col-reverse">
            <dt class="text-sm font-medium text-gray-600">Phone</dt>
            <dd class="text-xs text-gray-500">{{$user->phone}}</dd>
            </div>
        </dl>
        </a>
        @endforeach
    </div>
</div>

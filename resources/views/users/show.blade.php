<x-app-layout>
    <div class="border-b -mt-8 py-16">
        <x-container>
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="rounded-full w-16 h-16 border-2 border-blue-500 p-1" src="{{ $user->gravatar() }}"
                        alt="{{ $user->username }}">
                </div>
            </div>
            <div>
                <h1 class="font-semibold mb-3">{{ $user->name }}</h1>
                <div class="text-sm text-gray-500">
                    Joined {{ $user->created_at->diffForHumans() }}
                </div>
            </div>
        </x-container>
    </div>

    <div class="border-b mb-5">
        <x-container>
            <x-statistic :user="$user" />
        </x-container>
    </div>

    <x-container>
        <div class="grid grid-cols-2">
            <div class="space-y-5">
                <x-status :statuses="$statuses" />
            </div>
        </div>
    </x-container>
</x-app-layout>
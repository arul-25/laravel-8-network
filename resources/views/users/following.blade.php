<x-app-layout>
    <div class="border-b -mt-8 py-16">
        <x-container>
            <x-card-profile :user="$user" />
        </x-container>
    </div>

    <div class="border-b mb-5">
        <x-container>
            <x-statistic :user="$user" />
        </x-container>
    </div>

    <x-container>
        <div class="grid grid-cols-3 gap-5">
            <x-following :users="$follows"></x-following>
        </div>
    </x-container>
</x-app-layout>

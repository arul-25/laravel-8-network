<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                <div class="border rounded-xl p-5 mb-5">
                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="flex ">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body" id="body" placeholder="What is your mind"
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition-200"></textarea>
                                </div>

                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="space-y-6">
                    <div class="space-y-5">
                        @foreach ($statuses as $status)
                            <x-card>
                                <div class="flex b">
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                            alt="{{ $status->user->name }}">
                                    </div>
                                    <div>
                                        <div class="font-semibold">
                                            {{ $status->user->name }}
                                        </div>
                                        <div class="leading-relaxed">
                                            {{ $status->body }}
                                        </div>
                                        <div class="text-sm text-gray-600">
                                            {{ $status->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </x-card>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-5">
                <x-card>
                    <h1 class="font-semibold mb-5">Recently follows</h1>
                    @foreach (Auth::user()->follows()->limit(5)->get()
    as $user)
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                    alt="{{ $status->user->name }}">
                            </div>
                            <div>
                                <div class="font-semibold">
                                    {{ $user->name }}
                                </div>

                                <div class="text-sm text-gray-600">
                                    {{ $user->pivot->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>

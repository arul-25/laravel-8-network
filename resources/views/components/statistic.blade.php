<div class="flex justify-between items-center">
    <div class="flex">
        <a href="{{ route('profile', $user->username) }}" class="px-10 py-2  text-center border-r border-l">
            <div class="text-2x1 font-semibold mb-2">{{ $user->status->count() }}</div>
            <div class="uppercase text-gray-600 text-xs">Status</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'following']) }}"
            class="px-10 py-2  text-center border-r">
            <div class="text-2x1 font-semibold mb-2">{{ $user->follows->count() }}</div>
            <div class="uppercase text-gray-600 text-xs">Following</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'follower']) }}"
            class="px-10 py-2  text-center border-r">
            <div class="text-2x1 font-semibold mb-2">{{ $user->followers->count() }}</div>
            <div class="uppercase text-gray-600 text-xs">Follower</div>
        </a>
    </div>
    @if (Auth::id() !== $user->id)
        <div>
            <form action="{{ route('following.store', $user) }}" method="POST">
                @csrf
                <x-button>
                    @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        Unfollow
                    @else
                        Follow
                    @endif
                </x-button>
            </form>
        </div>
    @else
        <a href=""
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl text-sm text-white capitalize tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Edit
            Profile</a>
    @endif
</div>

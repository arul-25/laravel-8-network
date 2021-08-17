<div class="flex">
    <a href="{{ route('profile', $user->username) }}" class="px-10 py-2  text-center border-r border-l">
        <div class="text-2x1 font-semibold mb-2">{{ $user->status->count() }}</div>
        <div class="uppercase text-gray-600 text-xs">Status</div>
    </a>
    <a href="{{ route('profile.following', [$user->username, 'following']) }}"
        class="px-10 py-2  text-center border-r">
        <div class="text-2x1 font-semibold mb-2">{{ $user->follows->count() }}</div>
        <div class="uppercase text-gray-600 text-xs">Following</div>
    </a>
    <a href="{{ route('profile.following', [$user->username, 'follower']) }}"
        class="px-10 py-2  text-center border-r">
        <div class="text-2x1 font-semibold mb-2">{{ $user->followers->count() }}</div>
        <div class="uppercase text-gray-600 text-xs">Follower</div>
    </a>

</div>

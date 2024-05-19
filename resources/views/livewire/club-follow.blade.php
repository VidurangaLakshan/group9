{{--<div>--}}
{{--    <button wire.loading.attr="disabled" wire:click="toggleFollow()" class="flex items-center"--}}
{{--            style="border-style: none; padding-right: 30px; padding-bottom: 8px">--}}


{{--        <svg wire:loading.delay aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin fill-red-600"--}}
{{--             viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--            <path--}}
{{--                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"--}}
{{--                fill="currentColor"/>--}}
{{--            <path--}}
{{--                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"--}}
{{--                fill="currentFill"/>--}}
{{--        </svg>--}}


{{--        <svg wire:loading.delay.remove xmlns="http://www.w3.org/2000/svg" fill="{{ (Auth::user()?->hasFollowed($user)) ? '#dc2626' : 'none'}}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 {{ (Auth::user()?->hasFollowed($user)) ? 'text-red-600' : 'text-gray-600'}} hover:text-gray-900">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />--}}
{{--        </svg>--}}

{{--        <span class="text-gray-600 ml-2">{{ $user->followers()->count() }}</span>--}}
{{--    </button>--}}
{{--</div>--}}

<div>
    @if (Auth::user()?->hasFollowed($user))
        <button wire:click="toggleFollow()" class="flex items-center text-gray-600 ml-2"
                style="border-style: none; padding-right: 30px; padding-bottom: 8px; border-radius: 20px;">

            {{--        <svg wire:loading.delay.remove xmlns="http://www.w3.org/2000/svg" fill="{{ (Auth::user()?->hasFollowed($user)) ? '#dc2626' : 'none'}}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 {{ (Auth::user()?->hasFollowed($user)) ? 'text-red-600' : 'text-gray-600'}} hover:text-gray-900">--}}
            {{--            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />--}}
            {{--        </svg>--}}

            Followed ({{ $user->followers()->count() }})

        </button>
    @else
        <button wire:click="toggleFollow()" class="flex items-center text-gray-600 ml-2"
                style="border-style: none; padding-right: 30px; padding-bottom: 8px; border-radius: 20px;">

            {{--        <svg wire:loading.delay.remove xmlns="http://www.w3.org/2000/svg" fill="{{ (Auth::user()?->hasFollowed($user)) ? '#dc2626' : 'none'}}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 {{ (Auth::user()?->hasFollowed($user)) ? 'text-red-600' : 'text-gray-600'}} hover:text-gray-900">--}}
            {{--            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />--}}
            {{--        </svg>--}}

            Follow ({{ $user->followers()->count() }})

        </button>
    @endif
    {{--    <span class="text-gray-600 ml-2"></span>--}}
</div>

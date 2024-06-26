<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border/>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border/>
            @endif

            {{--            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())--}}
            {{--                <div class="mt-10 sm:mt-0">--}}
            {{--                    @livewire('profile.two-factor-authentication-form')--}}
            {{--                </div>--}}

            {{--                <x-section-border />--}}
            {{--            @endif--}}

            {{--            <div class="mt-10 sm:mt-0">--}}
            {{--                @livewire('profile.logout-other-browser-sessions-form')--}}
            {{--            </div>--}}



            {{-- if auth user is not admin, editor or alumni relations, then show the delete option --}}

            @if (auth()->user()->role->value !== 1 && auth()->user()->role->value !== 2 && auth()->user()->role->value !== 4 && auth()->user()->role->value !== 9)
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>

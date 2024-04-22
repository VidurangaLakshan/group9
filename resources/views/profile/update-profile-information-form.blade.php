<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- LinkedIn -->
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="linkedin" value="{{ __('LinkedIn Profile URL') }}" />--}}
{{--            <x-input id="linkedin" type="text" class="mt-1 block w-full" wire:model="state.linkedin" />--}}
{{--            <x-input-error for="linkedin" class="mt-2" />--}}
{{--        </div>--}}

        <!-- Personalization -->
        <div class="border-4 rounded-xl mt-4 col-span-6 sm:col-span-4">

            <div class="mt-4">
                <x-label class="text-center" for="contact" value="{{ __('PERSONALIZE YOUR EXPERIENCE') }}"/>
            </div>

            <div class="border-2 rounded-xl mt-4 mx-4">
                <div class="mt-4">
                    <x-label class="text-center" for="contact" value="{{ __('Commenting Preferences') }}"/>
                </div>

                <div class="my-4 flex items-center space-x-5 ml-5">
                    <x-label for="display_comments" value="{{ __('View Comments') }}"/>
                    <x-checkbox name="display_comments" id="display_comments" value="1" :checked="$this->user->display_comments ? true : false" wire:model="state.display_comments"/>
                    <x-label for="post_comments" value="{{ __('Post Comments') }}"/>
                    <x-checkbox name="post_comments" id="post_comments" value="1" :checked="$this->user->post_comments ? true : false" wire:model="state.post_comments"/>
                </div>
            </div>

            <div class="border-2 rounded-xl my-4 mx-4">
                <div class="mt-4">
                    <x-label class="text-center" for="contact"
                             value="{{ __('Choose your Interested Faculty (s)') }}"/>
                </div>

                @php
                    $checkCounter = 0;
                    if($this->user->interest_computing){
                        $checkCounter++;
                        //append to checkboxes array

                    }
                    if($this->user->interest_business){
                        $checkCounter++;
                    }
                    if($this->user->interest_law){
                        $checkCounter++;
                    }
                @endphp

                @php
                    $checkboxes = [];
                    if($this->user->interest_computing){
                        array_push($checkboxes, 'interest_computing');
                    }
                    if($this->user->interest_business){
                        array_push($checkboxes, 'interest_business');
                    }
                    if($this->user->interest_law){
                        array_push($checkboxes, 'interest_law');
                    }
                @endphp

                <div x-data="{ checkedCount: {{$checkCounter}},  checkboxes : {{ json_encode($checkboxes) }} }" class="my-4 flex items-center space-x-6 ml-5">
                    <x-label for="interest_computing" value="{{ __('Computing') }}"/>
                    <x-checkbox name="interest_computing" id="interest_computing" value="1" :checked="$this->user->interest_computing ? true : false" x-on:click="checkboxes.includes('interest_computing') ? checkboxes.splice(checkboxes.indexOf('interest_computing'), 1) : checkboxes.push('interest_computing'); checkedCount = checkboxes.length;" x-bind:disabled="checkedCount === 1 && checkboxes.includes('interest_computing')" wire:model="state.interest_computing"/>
                    <x-label for="interest_business" value="{{ __('Business') }}"/>
                    <x-checkbox name="interest_business" id="interest_business" value="1" :checked="$this->user->interest_business ? true : false" x-on:click="checkboxes.includes('interest_business') ? checkboxes.splice(checkboxes.indexOf('interest_business'), 1) : checkboxes.push('interest_business'); checkedCount = checkboxes.length;" x-bind:disabled="checkedCount === 1 && checkboxes.includes('interest_business')" wire:model="state.interest_business"/>
                    <x-label for="interest_law" value="{{ __('Law') }}"/>
                    <x-checkbox name="interest_law" id="interest_law" value="1" :checked="$this->user->interest_law ? true : false" x-on:click="checkboxes.includes('interest_law') ? checkboxes.splice(checkboxes.indexOf('interest_law'), 1) : checkboxes.push('interest_law'); checkedCount = checkboxes.length;" x-bind:disabled="checkedCount === 1 && checkboxes.includes('interest_law')" wire:model="state.interest_law"/>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>

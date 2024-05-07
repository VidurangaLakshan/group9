<x-guest-layout>

    <div style="margin: 100px 0">
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo/>
            </x-slot>

            <x-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('register') }}" x-data="{role: 7, degree_level: 1}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}"/>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                             placeholder="John Doe" required autofocus autocomplete="name"/>
                </div>

                <div class="mt-4">
                    <x-label for="fullName" value="{{ __('Full Name (Given to APIIT)') }}"/>
                    <x-input id="fullName" class="block mt-1 w-full" type="text" name="fullName"
                             :value="old('fullName')" required autofocus autocomplete="fullName"/>
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}"/>
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autocomplete="username"/>
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}"/>
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="new-password"/>
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
                </div>

                <div class="mt-4">
                    <x-label for="role" value="{{ __('Register as:') }}"/>
                    <select name="role" id="role_id" x-model="role"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="5">Academics</option>
                        <option value="7">Student</option>
                        <option value="8">Alumni</option>
                        <option value="6">Non-Academics</option>
                    </select>
                </div>

                <template x-if="role == 5 || role == 6 || role == 8">
                    <div class="mt-4">
                        <x-label for="nic" value="{{ __('National Identity Card') }}"/>
                        <x-input id="nic" class="block mt-1 w-full" type="text" name="nic" :value="old('nic')"
                                 x-bind:required="role == 5 || role == 6 || role == 8 ? true : false"/>
                    </div>
                </template>

                <template x-if="role == 7">
                    <div class="mt-4">
                        <x-label for="cb" value="{{ __('CB Number') }}"/>
                        <x-input id="cb" class="block mt-1 w-full" type="text" name="cb" :value="old('cb')"
                                 x-bind:required="role == 7 ? true : false"/>
                    </div>
                </template>


                @php
                    $currentYear = date('Y');
                    $currentYear = (int)$currentYear;
                @endphp

                <template x-if="role == 8">
                    <div class="mt-4">
                        <x-label for="graduation_year" value="{{ __('Year Of Graduation') }}"/>
                        <select name="graduation_year" id="graduation_year"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @for ($year = $currentYear; $year >= 2002; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </template>

                <template x-if="role == 7">
                    <div class="mt-4">
                        <x-label for="degree_level" value="{{ __('Level of Degree') }}"/>
                        <select name="degree_level" id="degree_level" x-model="degree_level"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="1">Foundation (Semester 1)</option>
                            <option value="2">Foundation (Semester 2)</option>
                            <option value="3">L4 (Semester 1)</option>
                            <option value="4">L4 (Semester 2)</option>
                            <option value="5">L5 (Semester 1)</option>
                            <option value="6">L5 (Semester 2)</option>
                            <option value="7">L6 (Semester 1)</option>
                            <option value="8">L6 (Semester 2)</option>
                            <option value="9">L7 (Semester 1)</option>
                            <option value="10">L7 (Semester 2)</option>
                        </select>
                    </div>
                </template>

                <template x-if="role == 5 || (role == 7 && (degree_level != 1 && degree_level != 2))">
                    <div class="mt-4">
                        <x-label for="faculty" value="{{ __('Faculty') }}"/>
                        <select name="faculty" id="faculty"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="1">School of Computing</option>
                            <option value="2">School of Business</option>
                            <option value="3">Law School</option>
                        </select>
                    </div>
                </template>

                <div class="border-4 rounded-xl mt-4">

                    <div class="mt-4">
                        <x-label class="text-center" for="contact" value="{{ __('PERSONALIZE YOUR EXPERIENCE') }}"/>
                    </div>

                    <div class="border-2 rounded-xl my-4 mx-4">
                        <div class="mt-4">
                            <x-label class="text-center" for="contact" value="{{ __('Commenting Preferences') }}"/>
                        </div>

                        <div class="my-4 flex items-center space-x-5 ml-5">
                            <x-label for="display_comments" value="{{ __('View Comments') }}"/>
                            <x-checkbox name="display_comments" id="display_comments" value="1" checked/>
                            <x-label for="post_comments" value="{{ __('Post Comments') }}"/>
                            <x-checkbox name="post_comments" id="post_comments" value="1" checked/>
                        </div>
                    </div>

                </div>


                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required/>

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>

</x-guest-layout>

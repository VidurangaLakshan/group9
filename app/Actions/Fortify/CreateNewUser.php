<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'nic' => ['string', 'max:12'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'fullName' => $input['fullName'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'nic' => isset($input['nic']) ? $input['nic'] : null,
            'role' => $input['role'],
            'faculty' => isset($input['faculty']) ? $input['faculty'] : null,
            'degree_level' => isset($input['degree_level']) ? $input['degree_level'] : null,
            'graduation_year' => isset($input['graduation_year']) ? $input['graduation_year'] : null,
            'display_comments' => isset($input['display_comments']) ? $input['display_comments'] : 0,
            'post_comments' => isset($input['post_comments']) ? $input['post_comments'] : 0,
            'interest_computing' => 1,
            'interest_business' => 1,
            'interest_law' => 1,
            'newUserPersonalized' => 0,
        ]);

        $notification = Notification::make()
            ->title('New User Registered')
            ->body("A new user with the email {$user->email} has registered.");

        // Send the notification to the database
        $notification->sendToDatabase(User::where('role', 1)->get());

        return $user;
    }
}

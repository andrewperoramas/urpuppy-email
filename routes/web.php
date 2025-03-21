<?php

use App\Mail\AdminNewContact;
use App\Mail\BreederAccountApproved;
use App\Mail\BreederAccountRejected;
use App\Mail\FreeAccountMail;
use App\Mail\NewBreederSpecialAccountMail;
use App\Mail\PremiumAccountMail;
use App\Mail\RenewBreederMail;
use App\Mail\RenewSellerMail;
use App\Mail\SubscriptionEnded;
use App\Mail\SupportTeamEmailResponseMail;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::post('verify-buyer', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    $user->assignRole('buyer');
    Auth::login($user);
    auth()->user()->notify(new VerifyEmail());

})->name('verify-buyer');

Route::post('verify-seller', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    $user->assignRole('seller');
    Auth::login($user);
auth()->user()->notify(new VerifyEmail());

})->name('verify-seller');

Route::post('verify-breeder', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    $user->assignRole('breeder');
    Auth::login($user);
    auth()->user()->notify(new VerifyEmail());

})->name('verify-breeder');

Route::post('admin-contact', function () {
    $payload = [
        'first_name' => 'Sasha',
        'last_name' => 'Iyamu',
        'email' => env('SEND_MAIL_TO'),
        'account_type' => 'Breeder',
        'subject' => 'I need help',
        'message' => 'lorem ipsum dolor sit amet  lorem ipsum dolor sit amet  lorem ipsum dolor sit amet  ',
    ];

    Mail::queue((new AdminNewContact($payload))->to(env('SEND_MAIL_TO')));
})->name('admin-contact');

Route::post('breeder-account-approved', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new BreederAccountApproved($user))->to(env('SEND_MAIL_TO')));
})->name('breeder-account-approved');

Route::post('breeder-account-rejected', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    $reason = 'Bad images';
    Mail::queue((new BreederAccountRejected($user, $reason))->to(env('SEND_MAIL_TO')));
})->name('breeder-account-rejected');

// Route for sending free account email
Route::post('free-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new FreeAccountMail($user))->to(env('SEND_MAIL_TO')));
})->name('free-account-mail');

Route::post('new-breeder-special-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new NewBreederSpecialAccountMail($user))->to(env('SEND_MAIL_TO')));
})->name('new-breeder-special-account-mail');

Route::post('premium-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new PremiumAccountMail($user))->to(env('SEND_MAIL_TO')));
})->name('premium-account-mail');

Route::post('renew-breeder-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new RenewBreederMail($user))->to(env('SEND_MAIL_TO')));
})->name('renew-breeder-mail');

Route::post('renew-seller-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new RenewSellerMail($user))->to(env('SEND_MAIL_TO')));
})->name('renew-seller-mail');

Route::post('subscription-ended', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => env('SEND_MAIL_TO')
    ]);
    Mail::queue((new SubscriptionEnded($user))->to(env('SEND_MAIL_TO')));
})->name('subscription-ended');

Route::post('support-team-email-response', function () {
    $response = 'lorem ipsum dolor sit amet';
    Mail::queue((new SupportTeamEmailResponseMail('Danny Lim', env('SEND_MAIL_TO'), $response))->to(env('SEND_MAIL_TO')));
})->name('support-team-email-response');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

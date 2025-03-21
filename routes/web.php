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
        'email' => 'wolfandrew307@gmail.com'
    ]);
    $user->assignRole('buyer');
    Auth::login($user);
    auth()->user()->notify(new VerifyEmail());

})->name('verify-buyer');

Route::post('verify-seller', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    $user->assignRole('seller');
    Auth::login($user);
auth()->user()->notify(new VerifyEmail());

})->name('verify-seller');

Route::post('verify-breeder', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    $user->assignRole('breeder');
    Auth::login($user);
    auth()->user()->notify(new VerifyEmail());

})->name('verify-breeder');

Route::post('admin-contact', function () {
    $payload = [
        'first_name' => 'Sasha',
        'last_name' => 'Iyamu',
        'email' => 'businessguy1982@yahoo.com',
        'account_type' => 'Breeder',
        'subject' => 'I need help',
        'message' => 'lorem ipsum dolor sit amet  lorem ipsum dolor sit amet  lorem ipsum dolor sit amet  ',
    ];

    Mail::queue((new AdminNewContact($payload))->to('businessguy1982@yahoo.com'));
})->name('admin-contact');

Route::post('breeder-account-approved', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new BreederAccountApproved($user))->to('businessguy1982@yahoo.com'));
})->name('breeder-account-approved');

Route::post('breeder-account-rejected', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    $reason = 'Bad images';
    Mail::queue((new BreederAccountRejected($user, $reason))->to('businessguy1982@yahoo.com'));
})->name('breeder-account-rejected');

// Route for sending free account email
Route::post('free-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new FreeAccountMail($user))->to('businessguy1982@yahoo.com'));
})->name('free-account-mail');

Route::post('new-breeder-special-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new NewBreederSpecialAccountMail($user))->to('businessguy1982@yahoo.com'));
})->name('new-breeder-special-account-mail');

Route::post('premium-account-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new PremiumAccountMail($user))->to('businessguy1982@yahoo.com'));
})->name('premium-account-mail');

Route::post('renew-breeder-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new RenewBreederMail($user))->to('businessguy1982@yahoo.com'));
})->name('renew-breeder-mail');

Route::post('renew-seller-mail', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new RenewSellerMail($user))->to('businessguy1982@yahoo.com'));
})->name('renew-seller-mail');

Route::post('subscription-ended', function () {
    User::query()->delete();
    $user = User::factory()->create([
        'email' => 'wolfandrew307@gmail.com'
    ]);
    Mail::queue((new SubscriptionEnded($user))->to('businessguy1982@yahoo.com'));
})->name('subscription-ended');

Route::post('support-team-email-response', function () {
    $response = 'lorem ipsum dolor sit amet';
    Mail::queue((new SupportTeamEmailResponseMail('Danny Lim', 'businessguy1982@yahoo.com', $response))->to('businessguy1982@yahoo.com'));
})->name('support-team-email-response');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

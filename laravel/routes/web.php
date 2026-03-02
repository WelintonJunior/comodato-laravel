<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

use App\Http\Controllers\CustomLoginController;

use Illuminate\Http\Request;
use App\Models\User;

// ...existing code...
use App\Filament\Pages\Auth\CustomLogin;

Route::get('/admin/login', CustomLogin::class)->name('filament.admin.auth.login');
// ...existing code...

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
})->name('filament.admin.auth.logout');

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('dashboard', ' ')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

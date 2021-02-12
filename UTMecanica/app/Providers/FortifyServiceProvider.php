<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Usuario;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::loginView(fn () => view('theme.back.login'));

        Fortify::authenticateUsing(function (Request $request) {
            $usuario = Usuario::where('email', $request->email)->first();

            if ($usuario && Hash::check($request->password, $usuario->password)) {
                $roles = $usuario->roles()->first();
                if ($usuario->estado) {
                    $fechaActual = strtotime(date('d-m-Y', time()));
                    $fechaCaducidad = date ('d-m-Y', strtotime($usuario->fecha_caducidad));
                    if ($fechaActual > $fechaCaducidad) {
                        if ($roles) {
                            $_SESSION['rol_slug'] = $roles->slug;
                            $_SESSION['rol_id'] = $roles->id;
                            return $usuario;
                        }
                    }
                }
                return false;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}

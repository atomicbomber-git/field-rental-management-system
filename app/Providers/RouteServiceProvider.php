<?php

namespace App\Providers;

use _HumbugBox3b5d526a7336\Nette\Neon\Exception;
use App\Enums\UserLevel;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/tempat-penyewaan';

    public static function defaultAdminRoute()
    {
        switch (auth()->user()->level ?? null) {
            case UserLevel::ADMIN_UTAMA:
                return route("tempat-penyewaan.index");
            case UserLevel::ADMIN_PENYEWAAN:
                return route("tempat-penyewaan-profile-management");
            case UserLevel::PENYEWA:
                return route("penyewa-profile-management");
            default:
                throw new Exception("No default admin route for user of type {$user->level}.");
        }
    }

    public static function defaultRoute(User $user = null)
    {
        switch ($user->level ?? null) {
            case UserLevel::ADMIN_UTAMA:
                return route("tempat-penyewaan.index");
            case UserLevel::ADMIN_PENYEWAAN:
                return route("tempat-penyewaan-profile-management");
            case UserLevel::PENYEWA:
            default:
                return route("welcome");
        }
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

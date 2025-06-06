<?php

    namespace App\Providers;

    use Illuminate\Cache\RateLimiting\Limit;
    use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\RateLimiter;
    use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    
    public const HOME = '/home';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            RateLimiter::for('api', function (Request $request) {
                return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
            });

            $this->routes(function () {
                // Estas líneas son las cruciales para las rutas API y web
                Route::middleware('api')
                    ->prefix('api') // Este prefijo es lo que hace que sea /api/products
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->group(base_path('routes/web.php'));

                // Si tienes rutas de consola, etc.
            });
    }
}

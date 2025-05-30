<?php

namespace App\Providers;

// **Importa la clase de RouteServiceProvider de Foundation**
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este namespace se aplica a tus controladores.
     *
     * @var string|null
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Llamado antes de que se registren las rutas.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Registra tus archivos de rutas.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
}

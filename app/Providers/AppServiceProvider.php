<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($url = env('RENDER_EXTERNAL_URL')) {
            config(['app.url' => $url]);
        }

        if ($databaseUrl = env('DATABASE_URL')) {
            config([
                'database.default' => 'pgsql',
                'database.connections.pgsql.url' => $databaseUrl,
            ]);
        }
    }
}

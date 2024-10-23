<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Models\LeituraEmProg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        Model::preventLazyLoading();

        Gate::define('edit-livro', function (LeituraEmProg $leitura_em_progresso) {
            return $leitura_em_progresso->leitor->is(Auth::leitor());
        });

    }
}

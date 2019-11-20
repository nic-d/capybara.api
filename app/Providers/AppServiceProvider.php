<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Node;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        collect($this->gates())->each(static function ($callback, $key) {
            Gate::define($key, $callback);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() : void
    {
        //
    }

    protected function gates() : array
    {
        return [
            # NODE
            'owns-node' => function (User $user, Node $node) {
                return $user->id === $node->user_id;
            },

            # NODE HARDWARE

            # NODE EVENT

        ];
    }
}

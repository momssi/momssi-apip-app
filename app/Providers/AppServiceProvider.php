<?php

namespace App\Providers;

use App\Domains\Member\repository\MemberRepository;
use App\Domains\Member\repository\MemberRepositoryInterface;
use App\Domains\Member\service\MemberServiceInterface;
use App\Domains\Member\service\MemberService;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MemberServiceInterface::class, MemberService::class);
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
            Log::info('', [
                'connection' => $query->connectionName,
                'sql' => $query->sql,
                'bindings' => $query->bindings,
                'time' => $query->time
            ]);
        });
    }
}

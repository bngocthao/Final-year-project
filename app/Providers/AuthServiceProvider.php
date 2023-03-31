<?php

namespace App\Providers;

use App\Models\Unit;
use App\Policies\UnitPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Unit::class => UnitPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == '1';
        });

        /* Phòng đào tạo */
        Gate::define('isTrainDepManager', function($user) {
            return $user->role == '2';
        });

        /* Hiệu trưởng/ trưởng khoa */
        Gate::define('isManager', function($user) {
            return $user->role == '3';
        });

        /* eGiảng viên */
        Gate::define('isProfessor', function($user) {
            return $user->role == '4';
        });

        Gate::define('isStudent', function($user) {
            return $user->role == '5';
        });
    }
}

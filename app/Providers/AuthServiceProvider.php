<?php

namespace App\Providers;

use App\Models\Unit;
use App\Models\UserRole;
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
        // the first parameters always the auth user

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            return in_array(1,$roles_id);
        });

        /* Phòng đào tạo */
        Gate::define('isHQ', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            return in_array(2,$roles_id);
        });

        /* Hiệu trưởng/ trưởng khoa */
        Gate::define('isManager', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            if (in_array(4, $roles_id)){
                return false;
            }
            return in_array(3, $roles_id);
        });

        Gate::define('isMan&Pro', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            return array_intersect(array(3,4), $roles_id);
        });

        /* eGiảng viên */
        Gate::define('isProfessor', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            if (in_array(3, $roles_id)){
                return false;
            }
            return in_array(4,$roles_id);
        });

//        Gate::define('has-any-role', function ($user, $roles) {
//            return $user->roles()->whereIn('name', $roles)->exists();
//        });

        Gate::define('isStudent', function($user) {
            // gate define has tested and return true
            $uid = $user->id;
            $role_id = UserRole::where('user_id', $uid)->get();
            $roles_id = array();
            // access to collection to get value inside each obj
            for($i = 0; $i < sizeof($role_id); $i++){
                $roles_id[] = $role_id[$i]->role_id;
            }
            return in_array(5,$roles_id);
        });
    }
}

<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\RolesController as RolesController;
use Session;
use App;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if (!app()->runningInConsole() && $user) {

            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }

            // must make email verification check here
            Session::forget('role');
            Session::forget('user_id');
            $role = RolesController::getuserrole($user->id);
            Session::put('role', $role);
            Session::put('user_id',$user->id);
            $local = Session::get('local');
            App::setLocale($local);
        }

        return $next($request);
    }
}

<?php
namespace App\Services;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleService {
    public function inden_role()
    {
        $id = Auth::id();
        $user = Auth::user();
        $role = $user->roles[0]['id'];
        return $role;
    }
}

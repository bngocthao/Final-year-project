<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    // self referrence 
    protected $fillable = [
        'name',
    ];

    // Vai trò có nhiều người dùng
    public function roles()
    {
        return $this->hasMany(User::class);
    }
}

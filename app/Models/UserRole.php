<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    use HasFactory;

    protected $table = 'user_role';

    // self referrence
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($item){
            dd('create event', $item);
        });
        static::deleted(function($item){
            dd('delete event', $item);
        });
    }

}

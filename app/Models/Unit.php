<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Major;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    // self referrence
    protected $fillable = [
        'name',
        'level',
        'head_of_unit_id'
    ];

    // đơn vị có nhiều ngành
    public function majors()
    {
        return $this->hasMany(Major::class);
    }

}

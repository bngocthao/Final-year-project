<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    // self referrence
    protected $fillable = [
        'name',
    ];

    // một học kỳ có nhiều đơn xin vắng
    public function postpone_applications()
    {
        return $this->hasMany(postpone_application::class);
    }
}

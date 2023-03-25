<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $table = 'years';

    // self referrence
    protected $fillable = [
        'name',
    ];

    // một năm học có nhiều đơn xin vắng
    public function postpone_applications()
    {
        return $this->hasMany(PostponeApplication::class);
    }
}

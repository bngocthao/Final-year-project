<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'majors';

    // self referrence 
    protected $fillable = [
        'name',
        'major_code',
        'unit_id',
    ];

    //Ngành thuộc 1 đơn vị
    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    //ngành có nhiều học phần - có thể model k nhận đc id
    public function subjects()
    {
    return $this->belongsToMany(Subject::class);
    }
    
    // Ngành có nhiều người dùng
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

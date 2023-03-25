<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Major;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'subject_code',
        'name',
        'credit',
    ];

    // Học phần có nhiều ngành, dùng pivot để lấy data của bảng trung gian
    // public function majors()
    // {
    //     return $this->belongsToMany(Major::class);
    //     // return $this->belongsToMany(Major::class);
    // }

    public function majors()
    {
        return $this->belongsToMany(Major::class,'major_subject','subject_id','major_id');
        // return $this->belongsToMany(Major::class);
    }

}

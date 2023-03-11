<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostponeApplication extends Model
{
    use HasFactory;

    protected $table = 'postpone_applications';

    protected $fillable = [
        'name',
        'user_id',
        'group',
        'subject_id',
        'major_id',
        'semester_id',
        'year_id',
        'reason',
        'teach_id',
        'teach_status',
        'teach_description',
        'comment_id',
        'result'
    ];

    // Một đơn xin vắng có nhiều ý kiến
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // một đơn thuộc về một người dùng
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // một đơn thuộc 1 hk
    public function semesters()
    {
        return $this->belongsTo(Semmester::class);
    }

    // 1 năm học
    public function years()
    {
        return $this->belongsTo(Year::class);
    }
}

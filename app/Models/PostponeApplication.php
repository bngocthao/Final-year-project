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
        'dean_status',
        'dean_description',
        'headmaster_status',
        'headmaster_description',
        'comment_id',
        'result',
        'point',
        'proof',
        'i_result_date',
    ];

    // Một đơn xin vắng có nhiều ý kiến
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // một đơn thuộc về một người dùng
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function teach()
    {
        return $this->belongsTo(User::class, 'teach_id', 'id');
    }

    // một đơn thuộc 1 hk
    public function semesters()
    {
        return $this->belongsTo(Semester::class,'semester_id', 'id');
    }

    // 1 năm học
    public function years()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }
}

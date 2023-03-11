<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'name',
        'user_id',
        'postpone_application_id',
        'status',
        'description',
    ];

    // Một ý kiến thuộc một người dùng
    public function users()
    {
    return $this->belongsToMany(User::class);
    }

    // Một ý kiến thuộc một đơn xin vắng
    public function postpone_applications()
    {
    return $this->belongsToMany(PostponeApplication::class);
    }
}

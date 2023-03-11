<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major_subject extends Model
{
    use HasFactory;

    protected $table = 'major_subject';

    // self referrence 
    protected $fillable = [
        'major_id',
        'subject_id'
    ];
}

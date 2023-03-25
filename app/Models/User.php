<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Athenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Athenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_code',
        'major_id',
        'role_id',
        'permission'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    // Người dùng thuộc một ngành
    public function majors()
    {
        return $this->belongsTo(Major::class,'major_id','id');
    }

    // Người dùng có nhiều đơn xin vắng
    public function postpone_applications()
    {
        return $this->hasMany(PostponeApplication::class, 'id', 'user_id');
    }

    public function teach()
    {
        return $this->hasOne(PostponeApplication::class, 'id', 'teach_id');
    }

    // Người dùng thuộc một vai trò
    public function roles()
    {
        // return $this->belongsTo(VaiTro::class, 'ma_vai_tro', 'id');
        return $this->belongsTo(Role::class,'role_id','id');
    }

    // Người dùng có nhiều ý kiến
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

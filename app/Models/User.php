<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\ClassModel;
use App\Models\Participant;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'identity_number';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identity_number',
        'fullname',
        'major',
        'faculty',
        'education_level',
        'email',
        'password',
        'is_verified',
        'role',
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

    public function ClassModel(){
        return $this->hasMany(ClassModel::class, 'teacher_id', 'id');
    }

    public function findForPassport($value){
        if($this->where('identity_number', $value)->count() > 0){
            return $this->where('identity_number', $value)->first();
        }
        return $this->where('email', $value)->first();
    }
}

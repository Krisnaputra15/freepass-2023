<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ClassModel extends Model
{
    use HasFactory;
    protected $table="class";
    protected $primaryKey = "id"; 
    protected $fillable = [
        'id',
        'name',
        'sks',
        'max_participant',
        'current_participant',
        'class_code',
        'teacher_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'teacher_id', 'identity_number');
    }
}

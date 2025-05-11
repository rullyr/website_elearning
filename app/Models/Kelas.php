<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'classes';

    protected $fillable = ['name', 'status', 'is_tryout'];


    public function statusLabel(): Attribute
    {
        return Attribute::get(function () {
            return $this->status === 'aktif' ? 'Aktif' : 'Non-Aktif';
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id')->withTimestamps();
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'class_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'class_id');
    }
}

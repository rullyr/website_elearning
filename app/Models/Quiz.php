<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'correct_answer',
    ];

    public function class()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'quiz_id');
    }
}

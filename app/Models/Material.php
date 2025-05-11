<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['class_id', 'title', 'source'];

    public function class()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function answers()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}

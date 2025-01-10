<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['survey_id', 'user_id', 'points_earned'];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}

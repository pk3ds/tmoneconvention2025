<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'user_id'];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}

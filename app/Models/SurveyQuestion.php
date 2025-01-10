<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['survey_id', 'question', 'type', 'order'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

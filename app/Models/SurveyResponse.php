<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SurveyResponse extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = ['survey_id', 'user_id', 'points_earned'];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['survey_id', 'points_earned', 'user_id'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\QuestionOptionFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function getTable()
    {
        return config('laravel-quiz.table_names.question_options');
    }

    /**
     * Backward compatibility of the attribute
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function option(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => $attributes['name'],
            set: fn ($value) => ['name' => $value],
        );
    }

    public function question()
    {
        return $this->belongsTo(config('laravel-quiz.models.question'));
    }

    public function answers()
    {
        return $this->hasMany(config('laravel-quiz.models.quiz_attempt_answer'));
    }

    protected static function newFactory()
    {
        return QuestionOptionFactory::new();
    }
}

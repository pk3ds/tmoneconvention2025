<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Award extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'remarks',
        'points',
        'awardable_id',
        'awardable_type',
    ];

    public function scopeSearch($query)
    {
        $query
            ->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('remarks', 'like', '%' . request('search') . '%');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'remarks', 'points', 'awardable.name']);
    }

    public function awardable()
    {
        return $this->morphTo();
    }
}

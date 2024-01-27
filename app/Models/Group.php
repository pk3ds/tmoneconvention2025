<?php

namespace App\Models;

use App\Models\User;
use App\Models\Award;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'points', 'rating'];

    public function scopeSearch($query)
    {
        $query
            ->where('name', 'like', '%' . request('search') . '%');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'points'])->dontSubmitEmptyLogs();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function awards()
    {
        return $this->morphMany(Award::class, 'awardable');
    }
}

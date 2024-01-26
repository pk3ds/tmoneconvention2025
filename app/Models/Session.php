<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'start_at',
        'end_at',
    ];

    public function scopeSearch($query)
    {
        $query
            ->where('name', 'like', '%' . request('search') . '%');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'description', 'start_at', 'end_at']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('points')->withTimestamps();
    }
}

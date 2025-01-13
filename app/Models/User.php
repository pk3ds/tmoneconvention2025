<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Award;
use App\Models\Group;
use App\Models\Winner;
use App\Models\Session;
use App\Models\Station;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_id',
        'station_id',
        'name',
        'email',
        'staff_id',
        'phone_no',
        'room_no',
        'points',
        'transport_mode',
        'pickup_location',
        'password',
        'employee_no',
        'position',
        'unit',
        'division',
        'gender',
        'band',
        'tag_category',
        'tag_division',
        'room_type',
        'check_in',
        'check_out',
        'activated_at',
        'use_password',
        'pickup_route',
        'dropoff_route',
        'pickup_bus_no',
        'dropoff_bus_no',
        'pickup_date',
        'dropoff_date',
        'group_no',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'use_password' => 'boolean',
        'password' => 'hashed',
        'pickup_date' => 'string',
        'dropoff_date' => 'string',
    ];

    public function scopeSearch($query)
    {
        $query
            ->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('staff_id', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly([
            'station.name',
            'group.name',
            'name',
            'email',
            'staff_id',
            'phone_no',
            'room_no',
            'points',
            'pickup_location',
            'pickup_route',
            'dropoff_route',
            'pickup_bus_no',
            'dropoff_bus_no',
            'pickup_date',
            'dropoff_date',
        ])->dontSubmitEmptyLogs();
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function awards()
    {
        return $this->morphMany(Award::class, 'awardable');
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot('points')->withTimestamps();
    }

    public function winner()
    {
        return $this->hasOne(Winner::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Award;
use App\Models\Group;
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
            'group.name',
            'name',
            'email',
            'staff_id',
            'phone_no',
            'room_no',
            'points',
            'pickup_location',
        ]);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function awards()
    {
        return $this->morphMany(Award::class, 'awardable');
    }
}

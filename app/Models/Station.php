<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'type', 'description', 'rating'];

    public function scopeSearch($query)
    {
        $query
            ->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('type', 'like', '%' . request('search') . '%');
    }
}

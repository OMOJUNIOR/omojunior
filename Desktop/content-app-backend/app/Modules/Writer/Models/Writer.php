<?php

namespace App\Modules\Writer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'avatar',
        'skills',
        'languages'

    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function contentRequests()
    {
        return $this->hasMany(\App\Modules\Content\Models\ContentRequest::class);
    }

    public function scopeListWriters($query)
    {
        return $query->with('user')->where('user_id','!=',null)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'code',
        'locale',
        'flag',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'image',
        'description',
        'content',
    ];


    public function languages()
    {
        return $this->hasMany(Language::class);
    }


    public function requests()
    {
        return $this->hasMany(RequestForm::class);
    }

    
}

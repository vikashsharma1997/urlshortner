<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'companyid');
    }

    public function urls()
    {
        return $this->hasMany(ShortUrl::class, 'companyid');
    }

    public function analytics()
    {
        return $this->hasManyThrough(
            Analytic::class,
            ShortUrl::class,
            'companyid',
            'urlid',
            'id',
            'id'
        );
    }
}

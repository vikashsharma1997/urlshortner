<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = [
        'userid',
        'companyid',
        'original_url',
        'shorten_url',
        'shortcode',
        'hits'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function analytics()
    {
        return $this->hasMany(Analytic::class, 'urlid', 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'companyid');
    }
}

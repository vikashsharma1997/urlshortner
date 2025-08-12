<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    
    protected $fillable = ['urlid', 'ip', 'hit_at'];

    public function shortUrl() {
        return $this->belongsTo(ShortUrl::class, 'urlid');
    }
}

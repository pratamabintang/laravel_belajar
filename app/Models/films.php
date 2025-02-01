<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class films extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['title', 'summary', 'release_year', 'poster', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(genres::class);
    }

    public function actors()
    {
        return $this->hasMany(actors::class, 'film_id');
    }  

    public function review()
    {
        return $this->hasMany(reviews::class, 'film_id');
    }  
}

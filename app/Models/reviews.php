<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'film_id', 'content', 'point'];

    public function film()
    {
        return $this->belongsTo(films::class);
    }

    public function user()
    {
        return $this->belongsTo(users::class);
    }
}

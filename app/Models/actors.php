<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class actors extends Model
{
    protected $table = 'actors';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['cast_id', 'film_id', 'name'];

    public function film()
    {
        return $this->belongsTo(films::class);
    }

    public function cast()
    {
        return $this->belongsTo(casts::class);
    }
}

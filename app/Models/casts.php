<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class casts extends Model
{
    protected $table = 'casts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name', 'age', 'bio'];

    public function actor()
    {
        return $this->hasMany(actors::class, 'cast_id');
    }  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function films()
    {
        return $this->hasMany(films::class, 'genre_id');
    }  
}

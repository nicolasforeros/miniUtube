<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_video', 'duration', 'description', 'categoria', 'estado', 'rutaVideo', 'rutaImagen', 'user_id',
    ];
}

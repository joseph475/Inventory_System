<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorsModel extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

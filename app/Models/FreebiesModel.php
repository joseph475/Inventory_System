<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreebiesModel extends Model
{
    protected $table = 'freebies';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'cost',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

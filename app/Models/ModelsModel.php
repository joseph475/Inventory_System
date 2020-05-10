<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelsModel extends Model
{
    protected $table = 'models';
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

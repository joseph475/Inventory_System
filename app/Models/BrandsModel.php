<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandsModel extends Model
{
    protected $table = 'brands';
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

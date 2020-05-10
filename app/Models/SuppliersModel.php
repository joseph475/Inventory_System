<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuppliersModel extends Model
{
    protected $table = 'suppliers';
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

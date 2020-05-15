<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewInventoryModel extends Model
{
    protected $table = 'vw_inventory';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $hidden = [
        'created_at',
        'updated_at',
        'supplier',
        'remarks',
        'category',
        'is_available',
    ];
}

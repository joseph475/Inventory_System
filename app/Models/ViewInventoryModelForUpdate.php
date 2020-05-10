<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewInventoryModelForUpdate extends Model
{
    protected $table = 'vw_inventory';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

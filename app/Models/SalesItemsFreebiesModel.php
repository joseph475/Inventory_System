<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesItemsFreebiesModel extends Model
{
    protected $table = 'sales_item_freebies';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'item_id',
        'freebies_id',
    ];
}

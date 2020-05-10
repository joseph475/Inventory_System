<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesItemsModel extends Model
{
    protected $table = 'sales_item';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'sales_id',
        'item_id',
    ];
}

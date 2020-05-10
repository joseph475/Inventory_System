<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'item_code',
        'category_id',
        'brand_id',
        'model_id',
        'supplier_id',
        'color_id',
        'cost',
        'price',
        'remarks',
        'user_id',
    ];
}

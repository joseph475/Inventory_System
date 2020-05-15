<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'receipt_no',
        'date',
        'mode_of_payment',
        'terms',
        'user_id',
        'gross_income',
        'expenses',
        'net_income'
    ];
    protected $hidden = [
        'created_at',
        'user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_qty',
        'product_price',
        'product_total',
        'trans_total',
        'trans_ref',
        'trans_status',
        


    ];
}

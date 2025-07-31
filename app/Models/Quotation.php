<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'customer_company'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vendorItems extends Model
{
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo('App\Models\Product','productId','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorPurchaseProductOrder extends Model
{
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo('App\Models\Product','vendorPurchaseOrderId','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorPurchaseOrder extends Model
{
    use SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor','vendorId','id');
    }

    public function purchase_items()
    {
        return $this->hasMany('App\Models\VendorPurchaseProductOrder','vendorPurchaseOrderId','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    public function state_data()
    {
        return $this->belongsTo('App\Models\State','state','id');
    }
}

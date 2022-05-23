<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table ="order_status";
    function purchase_order()
    {
        $this->hasMany('App\purchase_order');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase_orders';
    protected $fillable = [
        'itemName', 'details', 'quantity', 'price', 'total', 'status_id', 'approval_id',
    ];

    public function status()
    {
       return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function approval()
    {
        return $this->hasOne('App\Approval');
    }
}

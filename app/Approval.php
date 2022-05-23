<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $table = 'approvals';
    protected $fillable = ['po_id', 'finance', 'supervisor'];
    protected $casts = [
        'finance' => 'boolean',
        'supervisor' => 'boolean',
    ];
    public function purchase()
    {
        return $this->belongsTo('App\Purchase','po_id', 'id');
    }
}

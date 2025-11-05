<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'phone',
        'street_address',
        'city',
        'state',
        'zip_code'
    ];

    public function order(){
        return $this->belongsTo(Orders::class);
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last__name}";
    }
}

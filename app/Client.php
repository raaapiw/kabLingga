<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable =[

        'user_id',
        'nama_PT',
        'no_iup',
        'iup_expired',
        'npwp',
        'tdp_nib'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shippings(){
        return $this->hasMany(Shipping::class);
    }
}

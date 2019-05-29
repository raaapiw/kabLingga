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
        'tgl_iup',
        'iup_expired',
        'npwp',
        'tdp_nib',
        'tgl_npwp'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shippings(){
        return $this->hasMany(Shipping::class);
    }
}

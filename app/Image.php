<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable =[

        'shipping_id',
        'name',
        'evidence'
    ];

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
}

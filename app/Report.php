<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[

        'shipping_id',
        'name_report',
        'field_report'
    ];

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
}

<?php

namespace App\Http\Controllers\bapenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Client;
use App\Shipping;
use App\Report;
use App\image;

class ShippingController extends Controller
{
    //

    public function detail($id)
    {
        $shipping = Shipping::find($id);
        $reports = Report::where('shipping_id','=',$id)->get();
        $image = Image::where('shipping_id','=',$id)->get();
        

        return view('pages.bapenda.shipping.detail', compact('shipping','reports','image'));
    }
}

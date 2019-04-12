<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Shipping;

class ShippingController extends Controller
{
    //
    public function create()
    { 
        
        $clients = Client::all();
        $shippping = Shipping::all();
        // dd($clients);
        return view('pages.admin.shipping.form', compact ('clients', 'shipping'));
    }

    public function edit($id)
    { 
        $shipping = Shipping::find($id);
        $clients = Client::all();
        // dd($clients);
        return view('pages.admin.shipping.form', compact ('clients'));
    }

    public function list(){
        $shippings = Shipping::all();

        return view('pages.admin.shipping.list', compact ('shippings'));
    }

    public function store(){

    }

    public function update($id){

    }
}

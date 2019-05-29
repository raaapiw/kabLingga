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

class ClientController extends Controller
{
    //
    public function index()
    {
        $clients = Client::all();

        return view('pages.bapenda.client.list', compact('clients'));
    }

    public function detail($id)
    {
        $client = Client::find($id);
        $shippings = Shipping::where('client_id','=',$id)->get();

        return view ('pages.bapenda.client.detail', compact('client', 'shippings'));
    }
}

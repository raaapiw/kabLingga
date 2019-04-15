<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Client;
use App\Shipping;
use App\Report;
use App\Image;


class ImageController extends Controller
{
    //
    public function index()
    {
        //
        $shippings = Shipping::doesnthave('images')->get();
        // dd($shippings);
        return view('pages.admin.image.add', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $shipping = Shipping::find($id);
        

        return view ('pages.admin.image.form', compact('shipping'));
    }

    public function list()
    {
        $reports = Report::all();
        // return dd($reports);
        return view ('pages.admin.image.list', compact('reports'));
    }
}

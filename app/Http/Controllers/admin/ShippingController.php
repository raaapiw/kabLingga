<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
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

    public function detail($id)
    {
        $shipping = Shipping::find($id);

        return view('pages.admin.shipping.detail', compact('shipping'));
    }

    public function list(){
        $shippings = Shipping::all();

        return view('pages.admin.shipping.list', compact ('shippings'));
    }

    public function store(Request $request){
        // $data=[
        //     'client_id' => $request->client_id,
        //     'tongkang'=> $request->tongkang,
        //     'loading_plan'=> $request->loading_plan,
        //     'quantity'=> $request->quantity,
        //     'tax_proof'=> $request->quantity,
        //     'packing_list'=> $request->packing_list,         
        // ];
        
        // $order->fill($data)->save();
        
        $uploadedFile = $request->file('tax_proof');
        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
        if (Storage::exists($uploadedFileName)) {
            Storage::delete($uploadedFileName);
        }
        $path = $uploadedFile->storeAs('public/files/shipping', $uploadedFileName);

        $data = [
            'client_id' => $request->client_id,
            'tongkang'=> $request->tongkang,
            'loading_plan'=> $request->loading_plan,
            'quantity'=> $request->quantity,
            'tax_proof'=> $path,
            'packing_list'=> $request->packing_list,
        ];
        // dd($data);
        $shipping = Shipping::create($data);

        return redirect()->route('admin.shipping.list'); 
    }

    public function update(Request $request, $id){
        $shipping = Shipping::find($id);

        $uploadedFile = $request->file('tax_proof');
        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
        if (Storage::exists($uploadedFileName)) {
            Storage::delete($uploadedFileName);
        }
        $path = $uploadedFile->storeAs('public/files/shipping', $uploadedFileName);

        $data = [
            'client_id' => $request->client_id,
            'tongkang'=> $request->tongkang,
            'loading_plan'=> $request->loading_plan,
            'quantity'=> $request->quantity,
            'tax_proof'=> $path,
            'packing_list'=> $request->packing_list,
        ];
        // dd($data);
        $shipping->fill($data)->save();

        return redirect()->route('admin.shipping.list'); 
    }

    public function delete($id){
        $shipping = Shipping::find($id);
        $shipping->delete();
        return redirect()->route('admin.shipping.list');

    }
}

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
use App\User;
use App\Notifications\ApproveNotificationEmail;
use PDF;

class ShippingController extends Controller
{
    //
    public function create()
    { 
        
        $clients = Client::all();
        // $shipping = Shipping::all();
        // dd($shipping);
        return view('pages.admin.shipping.form', compact ('clients'));
    }

    public function edit($id)
    { 
        $shipping = Shipping::find($id);
        $clients = Client::all();
        // dd($clients);
        return view('pages.admin.shipping.form', compact ('clients', 'shipping'));
    }

    public function detail($id)
    {
        $shipping = Shipping::find($id);
        $reports = Report::where('shipping_id','=',$id)->get();
        $image = Image::where('shipping_id','=',$id)->get();
        

        return view('pages.admin.shipping.detail', compact('shipping','reports','image'));
    }

    public function list(){
        $shippings = Shipping::all();

        return view('pages.admin.shipping.list', compact ('shippings'));
    }

    public function store(Request $request){
        
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

    public function approve($id){
        $shipping = Shipping::find($id);
        // dd($shipping);
        return view('pages.admin.shipping.approve', compact('shipping'));
    }

    public function storeApprove(Request $request)
    {

        $data = [
            'shipping_id' => $request->shipping_id,
            'name_spv' => $request->name_spv,
            'state' => 1
        ];
        // dd ($request->shipping_id);
        $report = Report::create($data);

        $user = User::where('id','=',$request->name_spv)->first();
        $user->notify(new ApproveNotificationEmail($report));

        return redirect()->route('admin.shipping.list');
    }

    public function print($id)
    {
        // Fetch selected contract from database
        $data = Report::where('shipping_id','=',$id)->first();
        // return dd($data);
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pages.pdf.lsl4', ['data' => $data]);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->stream('contract1.pdf');
    }
}

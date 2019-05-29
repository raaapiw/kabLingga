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
        $shippings = Shipping::has('images')->get();
        // return dd($reports);
        return view ('pages.admin.image.list', compact('shippings'));
    }

    public function detail($id)
    {
        $image = Image::where('shipping_id','=',$id)->get();
        // return dd(storage_path());
        return view ('pages.admin.image.detail', compact('image'));
    }

    public function store(Request $request)
    {
        $arrayFile = $request->file('evidence');
        // $arrayType = $request->type;
        // return dd($arrayFile);
        // return dd($arrayType);
        
        foreach ($arrayFile as $index => $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->shipping_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/Image', $uploadedFileName); 
            // return dd($path);

            $data = [       
                'shipping_id' => $request->shipping_id,
                // 'type' =>$arrayType[$index],
                'evidence' => $uploadedFileName, 
            ];
            
            // dd($data);
            $image = Image::create($data);
            // dd($document);
        }
    }

    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        $arrayFile = $request->file('evidence');
        // $arrayType = $request->type;
        // return dd($arrayFile);
        // return dd($arrayType);
        
        foreach ($arrayFile as $index => $row){
            $uploadedFile =  $row;
            // dd($uploadedFile);
            $uploadedFileName = $request->shipping_id . '-' . $uploadedFile->getClientOriginalName();
            if (Storage::exists($uploadedFileName)) {
                Storage::delete($uploadedFileName);
            }
            // return dd($uploadedFileName);
            $path = $uploadedFile->storeAs('public/files/Image', $uploadedFileName);
            // return dd($path);

            $data = [       
                'shipping_id' => $request->shipping_id,
                // 'type' =>$arrayType[$index],
                'evidence' => $path, 
            ];
            
            // dd($data);
            $image->fill($data)->save();
            // dd($document);
        }
    }

    public function destroy($id)
    {
        //
        
        $image = Image::find($id)->delete();
        
        return redirect()->route('admin.image.list');
    }
}

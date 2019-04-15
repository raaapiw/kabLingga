<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Client;
use App\Shipping;
use App\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shippings = Shipping::doesnthave('report')->get();
        // dd($shippings);
        return view('pages.admin.report.add', compact('shippings'));
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
        

        return view ('pages.admin.report.form', compact('shipping'));
    }

    public function list()
    {
        $reports = Report::all();
        // return dd($reports);
        return view ('pages.admin.report.list', compact('reports'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $uploadedFile = $request->file('name_report');
        
        // dd($uploadedFile);
        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
        
        if (Storage::exists($uploadedFileName)) {
            Storage::delete($uploadedFileName);
        }
        $path = $uploadedFile->storeAs('public/files/report', $uploadedFileName);

        $data = [
            'shipping_id' => $request->shipping_id,
            'name_report'=> $path, 
        ];
        // dd($data);
        $report = Report::create($data);
        // dd($report);
        return redirect()->route('admin.report.list'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = Report::find($id);

        return view ('pages.admin.report.form', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $report = Report::find($id);

        $uploadedFile = $request->file('evidence');
        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
        if (Storage::exists($uploadedFileName)) {
            Storage::delete($uploadedFileName);
        }
        $path = $uploadedFile->storeAs('public/files/report', $uploadedFileName);

        $data = [
            
            'shipping_id'=> $request->shipping_id,
            'name_report'=> $path,    
        ];
        // dd($data);
        $report->fill($data)->save();

        return redirect()->route('admin.report.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $report = Report::find($id)->delete();

        return redirect()->route('admin.report.list');
    }
}

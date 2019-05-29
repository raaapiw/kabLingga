<?php

namespace App\Http\Controllers\supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Sentinel;
use Storage;
use App\Client;
use App\Shipping;
use App\Report;
use App\image;
class ReportController extends Controller
{
    //
    public function form($id){
        $report = Report::find($id);

        return view('pages.supervisor.report.form', compact('report'));
    }

    public function reject($id){
        $report = Report::find($id);

        return view('pages.supervisor.report.reject', compact('report'));
    }

    public function list(){
        $report = Report::where('name_spv', '=', Sentinel::getUser()->id)->Where('state', '=', 1)->get();

        return view('pages.supervisor.report.list', compact('report'));
    }

    public function rejectup(Request $request, $id)
    {
        $report = Report::find($id);

        $data = [
            'name_spv' => $request->name_spv,
            'barcode' => $request->barcode,
            'state' => 1
        ];
        
        $report->fill($data)->save();

        $user = User::where('id','=',$request->name_spv)->first();
        $user->notify(new ApproveNotificationEmail($report));

        return redirect()->route('supervisor.report.list'); 
    }

    
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $fileName = $request->shipping_id;
        $data = [
            'name_spv' => $request->name_spv,
            'barcode' => '127.0.0.1:8000/storage/files/report/'.$fileName.'.jpeg',
            'state_report' => 1,
            'state'=> 2
        ];

        // dd($data);
        $report->fill($data)->save();

        return redirect()->route('supervisor.report.list'); 
    }

    public function qrcode()
    {
        $file = public_path('qr.png');
        // $qr = $file->sentOutfile('public/files/qrcodes', '1.png');
        return \QrCode::format('png')->size(500)->generate('kerneldev.com');
    }
}

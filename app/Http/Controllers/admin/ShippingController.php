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
    public function post_lingga(){
        header('Content-Type: application/json;');

        $post_url = "http://mineralbatubara.com/index.php/api/confirmation_order/co_list/13";

        $username = "karimun";
        $appid = "947e60c174cdf10e1cb5ebd3dfeb2ceb";
        $password = "pass123karimun#@!";

        $hash = hash ( 'sha256' , $username.$appid.$password );

        $header = array();
        $header[] = 'Authorization: Bearer '.$username.':'.$hash.':'.$appid;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $post_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //execute post
        $result = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpCode == 404) {
            //echo "URL Not Found<br />";
            echo $result;
        }
        elseif($httpCode == 500) {
            //echo "Internal Server Error<br />";
            echo $result;
        }
        elseif($httpCode == 200) {

            var_dump ($result);
            $array_result = json_decode($result);
            // var_dump($array_result);
        }
        else {
            //echo "Unknown Error<br />";
            echo $result;
        }
        //close connection
        curl_close($ch);
        // die();
        // $array_result->co
    }
    public function create()
    {
        header('Content-Type: application/json;');

        $post_url = "http://mineralbatubara.com/index.php/api/confirmation_order/co_list/13";

        $username = "karimun";
        $appid = "947e60c174cdf10e1cb5ebd3dfeb2ceb";
        $password = "pass123karimun#@!";

        $hash = hash ( 'sha256' , $username.$appid.$password );

        $header = array();
        $header[] = 'Authorization: Bearer '.$username.':'.$hash.':'.$appid;
        $array_result = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $post_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //execute post
        $result = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpCode == 404) {
            //echo "URL Not Found<br />";
            echo $result;
        }
        elseif($httpCode == 500) {
            //echo "Internal Server Error<br />";
            echo $result;
        }
        elseif($httpCode == 200) {

            // var_dump ($result);
            $array_result = json_decode($result);
            // var_dump($array_result);

        }
        else {
            //echo "Unknown Error<br />";
            echo $result;
        }
        //close connection
        curl_close($ch);
    // die();

        // dd($array_result);
        // die();
        $clients = Client::all();
        // $shipping = Shipping::all();
        // dd($shipping);
        return view('pages.admin.shipping.form', compact ('clients','array_result'));
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

        // header('Content-Type: application/json;');

        // $post_url = "http://mineralbatubara.com/index.php/api/reports/submit_lhv";

        // $username = "karimun";
        // $appid = "947e60c174cdf10e1cb5ebd3dfeb2ceb";
        // $password = "pass123karimun#@!";

        // $hash = hash ( 'sha256' , $username.$appid.$password );

        // $header = array();
        // $header[] = 'Authorization: Bearer '.$username.':'.$hash.':'.$appid;
        // $fields = array(
        //     "co_id" => "no_ko",
        //     "iup_op_perusahaan" => " ",
        //     "iup_op_nomor" => "iup_op_nomor",
        //     "iup_op_tgl" => "2019-06-12",
        //     "iup_op_alamat" => "iup_op_alamat",
        //     "iup_op_angkut_perusahaan" => "iup_op_angkut_perusahaan",
        //     "iup_op_angkut_nomor" => "iup_op_angkut_nomor",
        //     "iup_op_angkut_tgl" => "2019-06-12",
        //     "iup_op_angkut_alamat" => "iup_op_angkut_alamat",
        //     "iup_op_jual_perusahaan" => "iup_op_jual_perusahaan",
        //     "iup_op_jual_nomor" => "iup_op_jual_nomor",
        //     "iup_op_jual_tgl" => "2019-06-12",
        //     "iup_op_jual_alamat" => "iup_op_jual_alamat",
        //     "nama_produk" => "KUARSA",
        //     "pelabuhan_muat" => "pelabuhan_muat",
        //     "pelabuhan_bongkar" => "pelabuhan_bongkar",
        //     "vessel" => "vessel",
        //     "barge" => "barge",
        //     "total_muatan" => "5000",
        //     "pajak_daerah" => "ADA",
        //     "bukti_setoran" => "ADA",
        //     "cnc" => "ADA",
        // );
        // $post_fields = http_build_query($fields);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $post_url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // //execute post
        // $result = curl_exec($ch);

        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // if($httpCode == 404) {
        //     //echo "URL Not Found<br />";
        //     echo $result;
        // }
        // elseif($httpCode == 500) {
        //     //echo "Internal Server Error<br />";
        //     echo $result;
        // }
        // elseif($httpCode == 200) {
        //     echo $result;
        // }
        // else {
        //     //echo "Unknown Error<br />";
        //     echo $result;
        // }
        // //close connection
        // curl_close($ch);

        $uploadedFile = $request->file('tax_proof');
        // dd($uploadedFile);
        $uploadedFile1 = $request->file('packing_list');
        $uploadedFile2 = $request->file('invoice');
        $uploadedFileName = $request->client_id . '-' . $uploadedFile->getClientOriginalName();
        if (Storage::exists($uploadedFileName)) {
            Storage::delete($uploadedFileName);
        }
        $path = $uploadedFile->storeAs('public/files/shipping', $uploadedFileName);

        $uploadedFileName1 = $request->client_id . '-' . $uploadedFile1->getClientOriginalName();
        if (Storage::exists($uploadedFileName1)) {
            Storage::delete($uploadedFileName1);
        }
        $path1 = $uploadedFile1->storeAs('public/files/shipping', $uploadedFileName1);

        $uploadedFileName2 = $request->client_id . '-' . $uploadedFile2->getClientOriginalName();
        if (Storage::exists($uploadedFileName2)) {
            Storage::delete($uploadedFileName2);
        }
        $path2 = $uploadedFile2->storeAs('public/files/shipping', $uploadedFileName2);

        $data = [
            'client_id' => $request->client_id,
            'tongkang'=> $request->tongkang,
            'loading_plan'=> $request->loading_plan,
            'quantity'=> $request->quantity,
            'tax_proof'=> $path,
            'packing_list'=> $path1,
            'no_tax' => $request->no_tax,
            'tgl_tax' => $request->tgl_tax,
            'invoice'=> $path2,
            'tempat_pemeriksaan' => $request->tempat_pemeriksaan,
            'pelabuhan_tujuan' => $request->pelabuhan_tujuan,
            'pelabuhan_muat' => $request->pelabuhan_muat,
            'no_lsl' => $request->no_lsl,
            'no_ko' => $request->no_ko,
            'tgl_ko' => $request->tgl_ko,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan,
            'jenis_produk'=> $request->jenis_produk
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

        $uploadedFile1 = $request->file('packing_list');
        $uploadedFileName1 = $request->client_id . '-' . $uploadedFile1->getClientOriginalName();
        if (Storage::exists($uploadedFileName1)) {
            Storage::delete($uploadedFileName1);
        }
        $path1 = $uploadedFile->storeAs('public/files/shipping', $uploadedFileName);

        $uploadedFile2 = $request->file('invoice');
        $uploadedFileName2 = $request->client_id . '-' . $uploadedFile2->getClientOriginalName();
        if (Storage::exists($uploadedFileName2)) {
            Storage::delete($uploadedFileName2);
        }
        $path2 = $uploadedFile->storeAs('public/files/shipping', $uploadedFileName);

        $data = [
            'client_id' => $request->client_id,
            'tongkang'=> $request->tongkang,
            'loading_plan'=> $request->loading_plan,
            'quantity'=> $request->quantity,
            'tax_proof'=> $path,
            'packing_list'=> $path1,
            'no_tax' => $request->no_tax,
            'tgl_tax' => $request->tgl_tax,
            'invoice'=> $path2,
            'tempat_pemeriksaan' => $request->tempat_pemeriksaan,
            'pelabuhan_tujuan' => $request->pelabuhan_tujuan,
            'pelabuhan_muat' => $request->pelabuhan_muat,
            'no_lsl' => $request->no_lsl,
            'no_ko' => $request->no_ko,
            'tgl_ko' => $request->tgl_ko,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan,
            'jenis_produk'=> $request->jenis_produk
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

@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
<link href="{{ asset('material/plugins/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Permintaan Approve LS-L</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Permintaan Approve LS-L</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ route('admin.shipping.storeApprove', $shipping->id)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="name_spv" value="5">
                    <input type="hidden" name="shipping_id" value="{{$shipping->id}}">
                    <div class="form-body">
                        <h3 class="card-title">Cek Kembali Data Shipping</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Nama IUPOP :</label>
                                    <input type="text" class="form-control" id="input" name="nama_tongkang" disabled placeholder="{{$shipping->client->nama_PT}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tongkang :</label>
                                    <input type="text" class="form-control" id="input" name="tongkang" disabled placeholder="{{$shipping->tongkang}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rencana Loading</label><br>
                                    <input  type="date" class="form-control" id="waktu" name="loading_plan" disabled placeholder="{{$shipping->loading_plan}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Packing List:</label>
                                <input type="text" class="form-control" id="waktu" name="packing_list" disabled placeholder="{{$shipping->packing_list}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity :</label><br>
                                    <input style="width:100px" type="number" class="form-control" id="tempat" name="quantity" disabled placeholder="{{$shipping->quantity}}"> Ton
                                </div>
                            </div>
                            <br>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('doctor.patient.detail', $registration->patient->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bukti Bayar Pajak :</label>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="el-card-item">
                                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('storage/files/Image/'.$shipping->tax_proof) }}{{--../assets/images/big/img1.jpg--}}" alt="user" />
                                                    <div class="el-overlay">
                                                        <ul class="el-info">
                                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('storage/files/Image/'.$shipping->tax_proof) }}"><i class="icon-magnifier"></i></a></li>
                                                            {{-- <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="el-card-content">
                                                    <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                                                    <br/> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pilih SPV</label><br>
                                    <select id="id" class="form-control custom-select" name="client_id" >
                                        @foreach($clients as $row)
                                        <option   value="{{$row->id}}">{{$row->id}} - {{ $row->nama_PT}}</option>                                                                   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
                            <a class="btn waves-effect waves-light btn-warning" href="{{ route('admin.shipping.edit', $shipping->id) }}">Edit</a>
                            <a class="btn btn-inverse btn-close" href="{{ url()->previous() }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')

<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 
<script src="{{ asset('material/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Magnific popup JavaScript -->
<script src="{{ asset('material/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('material/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
<script src="{{ asset('material/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

  
@endsection
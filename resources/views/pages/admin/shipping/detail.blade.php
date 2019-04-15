@extends('layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Detail</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            
            <li class="breadcrumb-item"><a href="#">List Shipping</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Detail Shipping</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#family" role="tab">Detail Foto Lapangan</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contract"role="tab">Detail Laporan</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <br>
                        <form action="#" class="tab-wizard wizard-circle">
                                <!-- Company Info -->
                            <section>
                                <h2><b>Info Perusahaan</b></h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="idPatient1">No. IUP :</label>
                                        <input type="text" class="form-control" disabled id="idPatient1" value="{{$shipping->client->no_iup}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneNumber1">Nama IUPOP :</label>
                                            <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$shipping->client->nama_PT}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Masa Berlaku IUP :</label>
                                            <input type="text" class="form-control" id="date1" disabled value="{{$shipping->client->iup_expired}}"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address1">Alamat :</label>
                                            <input type="text" class="form-control" disabled id="address1" value="{{$shipping->client->address}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address1">No. NPWP :</label>
                                            <input type="text" class="form-control" disabled id="address1" value="{{$shipping->client->npwp}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address1">TDP/NIB :</label>
                                            <input type="text" class="form-control" disabled id="address1" value="{{$shipping->client->tdp_nib}}">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <hr>
                        <h2><b>Detail Shipping </b></h2>
                        {{--  Table Diagnosis  --}}
                        <table id="myTable" class="table table-bordered table-striped">
                            <tr>
                                <thead>
                                    <th>Rencana Loading</th>
                                    <th>Nama Tongkang</th>
                                    <th>Quantity</th>
                                </thead>
                            </tr>
                            <tr>
                                <td>{{ $shipping->loading_plan }}</td>
                                <td>{{ $shipping->tongkang }}</td>
                                <td>{{ $shipping->quantity }}</td>                     
                            </tr>
                        </table>
                    </div>
                    <a class="btn btn-inverse btn-close" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>

  
@endsection
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
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contract"role="tab">Detail LS-L</a> </li>
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
                                    <th>Bukti Bayar Pajak</th>
                                </thead>
                            </tr>
                            <tr>
                                <td>{{ $shipping->loading_plan }}</td>
                                <td>{{ $shipping->tongkang }}</td>
                                <td>{{ $shipping->quantity }}</td> 
                                <td><center><a href="{{ Storage::url($shipping->tax_proof) }}"><span><i class="fa fa-download"></i></span></a></center></td>             
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane active" id="family" role="tabpanel">
                        <div class="row el-element-overlay">
                            <div class="col-md-12">
                                <h4 class="card-title">Gallery page</h4>
                                <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6></div>
                            @foreach($image as $row)
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('storage/files/Image/'.$row->evidence) }}{{--../assets/images/big/img1.jpg--}}" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset('storage/files/Image/'.$row->evidence) }}"><i class="icon-magnifier"></i></a></li>
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
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane active" id="contract" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th><center>Tanggal</center></th>
                                            <th style="width:50%"><center>Nama IUPOP</center></th>
                                            <th><center>No IUP</center></th>
                                            <th><center>Masa Berlaku IUP</center></th>
                                            <th><center>Rencana Loading</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $key=>$row)
                                            <tr>
                                                <td><center>{{$key+1}}</center></td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>{{ $row->shipping->client->nama_PT }}</td>
                                                <td>{{ $row->shipping->client->no_iup }}</td>
                                                <td>{{ $row->shipping->client->iup_expired }}</td>
                                                <td>{{ $row->loading_plan }}</td>
                                                <td>
                                                    <center>
                                                            <a href="{{route('admin.report.edit', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a>
                                                            <a href="{{route('admin.report.destroy', $row->id)}}"><span><i class="fa fa-trash-o"></i></span></a>
                                                            <a href="{{ Storage::url($row->name_report) }}"><span><i class="fa fa-download"></i></span></a>
                                                            {{-- <a href="{{ route('client.document.destroy', $row->id) }}"><span><i class="mdi mdi-delete"></i></span></a> --}}
                                                    </center>
                                                </td>
                                            </tr>                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
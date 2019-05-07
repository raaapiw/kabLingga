@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Shipping</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Shipping</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form class="m-t-40">
                <section>
                    <h2><b>Info Perusahaan</b></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idPatient1">No. IUP :</label>
                            <input type="text" class="form-control" disabled id="idPatient1" value="{{$client->no_iup}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Nama IUPOP :</label>
                                <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$client->nama_PT}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date1">Masa Berlaku IUP :</label>
                                <input type="text" class="form-control" id="date1" disabled value="{{$client->iup_expired}}"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address1">Alamat :</label>
                                <input type="text" class="form-control" disabled id="address1" value="{{$client->address}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address1">No. NPWP :</label>
                                <input type="text" class="form-control" disabled id="address1" value="{{$client->npwp}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address1">TDP/NIB :</label>
                                <input type="text" class="form-control" disabled id="address1" value="{{$client->tdp_nib}}">
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <hr>
            <h2><b>Daftar Shipping </b></h2>
            {{--  Table Diagnosis  --}}
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rencana Loading</th>
                        <th>Nama Tongkang</th>
                        <th>Quantity</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shippings as $key=> $row)
                    <tr>
                        <td><center>{{$key+1}}</center></td>
                        <td>{{ $row->loading_plan }}</td>
                        <td>{{ $row->tongkang }}</td>
                        <td>{{ $row->quantity }}</td> 
                        <td>
                            <center>
                                <a href="{{route('bapenda.shipping.detail', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
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
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
@endsection
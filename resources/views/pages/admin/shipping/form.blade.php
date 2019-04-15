@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($shipping) ? 'Edit Shipping': 'Tambah Shipping Baru'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($shipping) ? 'Edit Shipping':'Tambah Shipping Baru'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($shipping) ? route('admin.shipping.update', $shipping->id) : route('admin.shipping.store')}}" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="client_id" value="{{ $clients->id}}"> --}}
                    <div class="form-body">
                        <h3 class="card-title">Tambah Shipping Baru</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Nama IUPOP :</label>
                                    @if(isset($clients))
                                    <select id="id" class="form-control custom-select" name="client_id" >
                                        @foreach($clients as $row)
                                        <option   value="{{$row->id}}">{{$row->id}} - {{ $row->nama_PT}} </option>                                                                   
                                        @endforeach
                                    </select>
                                    @else
                                    <select id="id" class="form-control custom-select" name="client_id" >
                                        @foreach($clients as $row)
                                        <option   value="{{$row->id}}">{{$row->id}} - {{ $row->nama_PT}}</option>                                                                   
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tongkang :</label>
                                    <input type="text" class="form-control" id="input" name="tongkang">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Loading Plan :</label><br>
                                    <input style="width:100px" type="number" class="form-control" id="waktu" name="loading_plan"> Ton
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Packing List:</label>
                                <input type="text" class="form-control" id="waktu" name="packing_list">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity :</label><br>
                                    <input style="width:100px" type="number" class="form-control" id="tempat" name="quantity">
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
                                    <input type="file" id="file" name="tax_proof" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
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


  
@endsection
@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($report) ? 'Edit LHV': 'Tambah LHV Baru'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($report) ? 'Edit LHV':'Tambah LHV Baru'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($report) ? route('admin.report.update', $report->id) : route('admin.report.store')}}" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="name_report" value="LHV"> --}}
                    <input type="hidden" name="shipping_id" value="{{$shipping->id}}">
                    {{-- <input type="hidden" name="client_id" value="{{$shipping->client->id}}"> --}}
                    <div class="form-body">
                        <h3 class="card-title">Tambah LHV</h3>
                        <hr>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Pilih Jenis Laporan :</h4>
                                    <label class="custom-control custom-radio">
                                        <input required id="radio5" name="radio" type="radio" class="custom-control-input" value="0" >
                                        <span class="custom-control-label">LHV</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio6" name="radio" type="radio" class="custom-control-input" value="1" >
                                        <span class="custom-control-label">Field Report</span>
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2><b>File LHV</b></h2>
                                    <input type="file" id="file" name="name_report" class="dropify" required/>
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
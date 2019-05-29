@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($image) ? 'Edit Gambar': 'Tambah Gambar Baru'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($image) ? 'Edit Gambar':'Tambah Gambar Baru'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($image) ? route('admin.image.update', $report->id) : route('admin.image.store')}}" method="POST" enctype="multipart/form-data">
                    {{-- <input type="hidden" name="name_report" value="LHV"> --}}
                    <input type="hidden" name="shipping_id" value="{{$shipping->id}}">
                    {{-- <input type="hidden" name="client_id" value="{{$shipping->client->id}}"> --}}
                    <div class="form-body">
                        <h3 class="card-title">Tambah Gambar Baru</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2><b>Gambar 1</b></h2>
                                    <input type="file" id="file" name="evidence[]" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2><b>Gambar 2</b></h2>
                                    <input type="file" id="file" name="evidence[]" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2><b>Gambar 3</b></h2>
                                    <input type="file" id="file" name="evidence[]" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h2><b>Gambar 4</b></h2>
                                    <input type="file" id="file" name="evidence[]" class="dropify" required/>
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
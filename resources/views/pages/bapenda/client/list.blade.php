@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Perusahaan Tambang</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Perusahaan Tambang</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><center>Tanggal</center></th>
                                <th style="width:50%"><center>Nama Perusahaan Tambang</center></th>
                                <th><center>No IUP</center></th>
                                <th><center>Masa Berlaku IUP</center></th>
                                <th><center>Rencana Loading</center></th>
                                <th><center>Nama Tongkang</center></th>
                                <th><center>Quantity</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shippings as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->nama_PT }}</td>
                                    <td>{{ $row->no_iup }}</td>
                                    <td>{{ $row->iup_expired }}</td>
                                    <td>
                                        <center>
                                                <a href="{{route('bapenda.client.detail', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
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
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 0, "asc" ]]
});</script>
@endsection
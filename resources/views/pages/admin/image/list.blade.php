@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Gambar</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Gambar</li>
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
                                <th style="width:50%"><center>Nama IUPOP</center></th>
                                <th><center>No IUP</center></th>
                                <th><center>Masa Berlaku IUP</center></th>
                                <th><center>Rencana Loading</center></th>
                                <th><center>Download LS-L</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shippings as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->client->nama_PT }}</td>
                                    <td>{{ $row->client->no_iup }}</td>
                                    <td>{{ $row->client->iup_expired }}</td>
                                    <td>{{ $row->loading_plan }}</td>
                                    <td>
                                        <center>
                                                {{-- <a href="{{route('admin.report.edit', $row->id)}}"><span><i class="fa fa-pencil"></i></span></a> --}}
                                                {{-- <a href="{{route('admin.report.destroy', $row->id)}}"><span><i class="fa fa-trash-o"></i></span></a> --}}
                                                <a href="{{route('admin.image.detail', $row->id)}}"><span><i class="fa fa-search"></i></span></a>
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
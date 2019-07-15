@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('material/plugins/morrisjs/morris.css')}}" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Quantity Bulanan (Ton)</h4>
                <div id="morris-bar-chart"></div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2><b>Daftar Shipping</b></h2>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><center>Rencana Loading</center></th>
                                <th style="width:50%"><center>Nama IUPOP</center></th>
                                <th><center>No IUP</center></th>
                                <th><center>Masa Berlaku IUP</center></th>
                                <th><center>Nama Tongkang</center></th>
                                <th><center>Quantity</center></th>
                                <th><center>Detail</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shippings as $key=>$row)
                                <tr>
                                    <td><center>{{$key+1}}</center></td>
                                    <td>{{ $row->loading_plan }}</td>
                                    <td>{{ $row->client->nama_PT }}</td>
                                    <td>{{ $row->client->no_iup }}</td>
                                    <td>{{ $row->client->iup_expired }}</td>
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
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
} );
</script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="{{ asset('material/plugins/raphael/raphael-min.js')}}"></script>
<script src="{{ asset('material/plugins/morrisjs/morris.js')}}"></script>
{{-- <script>
    Morris.Bar({
       element: 'morris-bar-chart',
       data: [{
           y: "{{ $month5->format('m-y')}}",
           a: "{{ $shipping5}}"
       }, {
           y: "{{ $month4->format('m-y')}}",
           a: "{{ $shipping4}}"
       }, {
           y: "{{ $month3->format('m-y')}}",
           a: "{{ $shipping3}}"
       }, {
           y: "{{ $month2->format('m-y')}}",
           a: "{{ $shipping2}}"
       }, {
           y: "{{ $month1->format('m-y')}}",
           a: "{{ $shipping1}}"
       }, {
           y: "{{ $today->format('m-y')}}",
           a: "{{ $shipping0}}"
       }],
       xkey: 'y',
       ykeys: ['a'],
       labels: ['Quantity'],
       barColors:['#55ce63'],
       hideHover: 'auto',
       gridLineColor: '#eef0f2',
       resize: true
   });
</script> --}}
@endsection

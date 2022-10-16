@extends('layouts.app')
@section('headerPage','Dashboard')
@section('content')
<!-- Earnings (Monthly) Card Example -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Harian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$day}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bulan {{date('F')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$month}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Uang Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$tagihans}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tagihan yang belum dibayar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tagihans2}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pelanggan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user->count()}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Block</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$block->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visualization Data Pemakaian M<sup>3</sup></h6>
                </div>
                <div class="card-body" style="overflow: auto">
                    <div class="chart-area">
                        <div id="chartPencapaian" style="height: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
@endsection

@section('coding')
@php
    $t= date('Y');
@endphp
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script>
        Highcharts.chart('chartPencapaian', {
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text: 'Jumlah Pemkaian Meter {{$t}}'
//     },
//     subtitle: {
//         text: 'PAMSIMAS SEKAR MANDIRI JAYA DESA CIHAUR'
//     },
//     xAxis: {
//         categories: [
//             'Jan',
//             'Feb',
//             'Mar',
//             'Apr',
//             'May',
//             'Jun',
//             'Jul',
//             'Aug',
//             'Sep',
//             'Oct',
//             'Nov',
//             'Dec'
//         ],
//         crosshair: false
//     },
//     yAxis: {
//         min: 0,
//         title: {
//             text: 'Meter'
//         }
//     },
//     tooltip: {
//         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//         pointFormat: '<tr><td style="color:{series.color};padding:0">: </td>' +
//             '<td style="padding:0"><b>{point.y:.1f} M<sup>3</sup></sup></b></td></tr>',
//         footerFormat: '</table>',
//         shared: true,
//         useHTML: true
//     },
//     plotOptions: {
//         column: {
//             pointPadding: 0.2,
//             borderWidth: 0
//         }
//     },
//     series: [{
//         data: [{!!json_encode($nilai1)!!}, {!!json_encode($nilai2)!!}, {!!json_encode($nilai3)!!},{!!json_encode($nilai4)!!}, {!!json_encode($nilai5)!!}, {!!json_encode($nilai6)!!}, {!!json_encode($nilai7)!!}, {!!json_encode($nilai8)!!}, {!!json_encode($nilai9)!!}, {!!json_encode($nilai10)!!}, {!!json_encode($nilai11)!!}, {!!json_encode($nilai12)!!}]
//     }]
// });
    </script>
@endsection
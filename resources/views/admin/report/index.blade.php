@extends('layouts.app')
@section('style')
    <link href="{{asset('table/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('table/Buttons-2.2.2/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('headerPage','Report')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body col-12">
        <div class="form-search">
            <form action="{{route('report')}}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="start_date" value="{{request('start_date')}}">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="end_date" value="{{request('end_date')}}">
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-md btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            @if(request('start_date') && request('end_date'))
                <table class="table table-hover table-responsive-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th id="">No</th>
                            <th id="">ID Transaksi</th>
                            <th id="">Nama</th>
                            <th id="">Nama Bulan</th>
                            <th id="">Tahun</th>
                            <th id="">Meter lalu</th>
                            <th id="">Meter ini</th>
                            <th id="">Pemakaian</th>
                            <th id="">Abodamen</th>
                            <th id="">Diskon</th>
                            <th id="">Denda</th>
                            <th>Harga / M<sup>3</sup></th>
                            <th id="id">Awal Tagihan</th>
                            <th id="">Total</th>
                            <th id="">Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th id="">No</th>
                            <th id="">ID Transaksi</th>
                            <th id="">Nama</th>
                            <th id="">Nama Bulan</th>
                            <th id="">Tahun</th>
                            <th id="">Meter lalu</th>
                            <th id="">Meter ini</th>
                            <th id="">Pemakaian</th>
                            <th id="">Abodamen</th>
                            <th id="">Diskon</th>
                            <th id="">Denda</th>
                            <th>Harga / M<sup>3</sup></th>
                            <th id="">Dibuat Tagihan</th>
                            <th id="">Total</th>
                            <th id="">Status</th>
                            {{-- <th colspan="2" style="text-align: center" id="">Action</th> --}}
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($tagihans->count())
                                @foreach ($tagihans as $key=>$tagihan)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$tagihan->transaksiID}}</td>
                                    <td>{{$tagihan->user->name}}</td>
                                    <td>{{$tagihan->bulan}}</td>
                                    <td>{{$tagihan->tahun}}</td>
                                    <td>{{$tagihan->m_lalu}}</td>
                                    <td>{{$tagihan->m_ini}}</td>
                                    <td>{{$tagihan->pemakaian}}</td>
                                    <td>{{$tagihan->abodamen}}</td>
                                    <td>{{$tagihan->diskon}}</td>
                                    <td class="text-center">
                                        @if ($tagihan->status == 0 && ($tagihan->created_at->day >  10 ||
                                        $tagihan->created_at->weekOfMonth >= 1 ||
                                        $tagihan->created_at->month != $tagihan->created_at->now()->month || $tagihan->created_at->year != $tagihan->created_at->now()->year ) && $tagihan->denda == 0)
                                            <a href="{{route('tagihan.denda', $tagihan->id)}}" onclick="return confirm('Akan ditambahkan Denda. Anda yakin ingin Menambah Denda? ')">
                                                <em class="fas fa-times" style="color: rgb(236, 100, 100)"></em>
                                            </a>
                                        @else
                                            <p>{{$tagihan->denda}}</p>
                                        @endif
                                    </td>
                                    <td>{{$tagihan->permeter}}</td>
                                    <td>{{$tagihan->created_at->diffForHumans()}}</td>
                                    <td>{{$tagihan->total}}</td>
                                    <td class="text-center">
                                        @if ($tagihan->status == 0)
                                            <a href="{{route('tagihan.edit', $tagihan->id)}}">
                                                <em class="fas fa-times" style="color: rgb(236, 100, 100)"></em>
                                            </a>
                                        @else
                                            Sudah Bayar
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@section('script')
    <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('table/datatables.min.js')}}"></script>
    <script src="{{asset('table/SearchBuilder-1.3.2/js/dataTables.searchBuilder.js')}}"></script>
    {{-- <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('table/JSZip-2.5.0/jszip.js')}}"></script>
    <script type="text/javascript" src="{{asset('table/pdfmake-0.1.36/pdfmake.js')}}"></script>
    <script type="text/javascript" src="{{asset('table/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('table/Buttons-2.2.2/js/dataTables.buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('table/Buttons-2.2.2/js/buttons.html5.js')}}"></script>
    <script type="text/javascript" src="{{asset('table/Buttons-2.2.2/js/buttons.print.js')}}"></script> --}}
    <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: "Bfrtip",
                buttons:['excel', 'pdf', 'print'],
                // retrieve: true,
                destroy: true,
            });
        } );
    </script> 
@endsection
@endsection
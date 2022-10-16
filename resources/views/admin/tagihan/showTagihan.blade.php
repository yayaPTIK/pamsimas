@extends('layouts.app')
@push('style')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
@endpush
@section('headerPage','Show Tagihan')
@section('content')
                @if(session('successMsg'))
                    <div class="alert alert-success">
                        <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                        <span>
                            {{session('successMsg')}}
                        </span>
                    </div>
                @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
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
                                                    <td>{{$tagihan->created_at->diffForHumans()}}</td>
                                                    <td>{{$tagihan->total}}</td>
                                                    <td class="text-center">
                                                        @if ($tagihan->status == 0)
                                                            <a href="{{route('tagihan.edit', $tagihan->id)}}">
                                                                <em class="fas fa-times" style="color: rgb(236, 100, 100)"></em>
                                                            </a>
                                                        @else
                                                            <i class="fas fa-check" style="color: rgb(65, 255, 65)"></i>
                                                        @endif
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <a href="{{route('tagihan.create', $tagihan->id)}}" class="btn btn-sm btn-primary">
                                                            <em class="fas fa-paper-plane"></em>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Data akan terhapus. Anda yakin ingin menghapusnya? ')" ><em class="fas fa-trash"></em></button>
                                                        </form>
                                                        
                                                    </td>                      --}}
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7"><p style="color: red"><b>Data tidak ditemukan!</b></p></td>
                                            </tr>                                   
                                        @endif
                                    </tbody>
                                </table>
                                <div class="">{{$tagihans->links()}}</div>
                            </div>
                        </div>
                    </div>
@push('src')
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script> --}}
@endpush
{{-- <div id="lunas" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>bagian body modal.</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
			</div>
		</div>
	</div> --}}
@endsection
@extends('layouts.app')
@push('style')
@endpush
@section('headerPage','Show Pelanggan')
@section('content')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body col-12">
                            <!--
                                <a href="" class="btn btn-md btn-success mb-3">
                                    <em class="far fa-plus-square"></em>
                                </a>
                            -->
                            {{-- <form action="{{route('showUser')}}" method="get" style="display: inline-block; float: right;">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" autofocus name="search" placeholder="Cari Nama Disini" value="{{request('search')}}">
                                <button class="btn btn-info d-none btn-sm" type="submit" id="button-addon2">
                                    <em class="fas fa-search"></em>
                                </button>
                            </div>
                            </form> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th id="">No</th>
                                            <th id="">Nama</th>
                                            <th id="">No. Hp</th>
                                            <th id="">Alamat</th>
                                            <th id="">Layanan</th>
                                            <th id="id">Tagihan Bulan Terakhir</th>
                                            <th id="">Tunggakan</th>
                                            <th colspan="3" style="text-align: center" id="">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th id="">No</th>
                                            <th id="">Nama</th>
                                            <th id="">No. Hp</th>
                                            <th id="">Alamat</th>
                                            <th id="">Layanan</th>
                                            <th id="id">Tagihan Bulan Terakhir</th>
                                            <th id="">Tunggakan</th>
                                            <th colspan="3" style="text-align: center" id="">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if ($users->count())
                                        @php
                                            $no=1;
                                        @endphp
                                             @foreach ($users as $key=>$user)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->hp}}</td>
                                                    <td>{{$user->alamat}}</td>
                                                    <td>{{$user->layanan->name}}</td>
                                                    <td>
                                                        @if ($user->tagihans->count())
                                                            {{$user->tagihans->last()->bulan}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{$user->tagihs2()}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route('tagihan.index', $user->id)}}" target="_blank" class="btn btn-sm btn-success">
                                                            <em class="fas fa-dollar-sign"></em>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('tagihan.create', $user->id)}}" target="_blank" class="btn btn-sm btn-primary">
                                                            <em class="fas fa-paper-plane"></em>
                                                        </a>
                                                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                            <em class="fas fa-paper-plane"></em>
                                                        </button> --}}
                                                        {{-- <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('tagihan.store')}}" method="POST">
                                                                            @csrf
                                                                            <div class="row">                    
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <?php
                                                                                            $hari = date('d');
                                                                                            $bulan = date('m');
                                                                                            $tahun = date('Y');
                                                                                        ?>
                                                                                        <input type="hidden" name="user_id" value="{{$user->id}}" class="form-control">
                                                                                        <input type="hidden" name="block" value="{{$user->alamat}}" class="form-control">
                                                                                        <input type="hidden" name="name" value="{{$user->name}}" class="form-control">
                                                                                        <input type="hidden" name="transaksiID" value="{{$tagih->count()+1}}" class="form-control">
                                                                                        <input type="hidden" name="layanan" value="{{$user->layanan_id}}" class="form-control">
                                                                                        <label for="nama">Transaksi ID</label>
                                                                                        <input type="text" name="" disabled value="ID{{$hari}}{{$bulan}}{{$tahun}}{{$tagih->count()}}"  class="form-control" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="nama">Nama</label>
                                                                                        <input type="text" name="" disabled class="form-control" value="{{$user->name}}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="bulan">Bulan</label>
                                                                                        <select name="bulan" id="bulan" autofocus class="form-control" required>
                                                                                            <option value=""></option>
                                                                                            <option value="Januari">Januari</option>
                                                                                            <option value="Februari">Februari</option>
                                                                                            <option value="Maret">Maret</option>
                                                                                            <option value="April">April</option>
                                                                                            <option value="Mei">Mei</option>
                                                                                            <option value="Juni">Juni</option>
                                                                                            <option value="Juli">Juli</option>
                                                                                            <option value="Agustus">Agustus</option>
                                                                                            <option value="September">September</option>
                                                                                            <option value="Oketober">Oketober</option>
                                                                                            <option value="November">November</option>
                                                                                            <option value="Desember">Desember</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="tahun">Tahun</label>
                                                                                        <input type="number" name="tahun" disabled value="{{$tahun}}" class="form-control"  required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="m_lalu">Meter Bulan Lalu</label>
                                                                                        @if ($user->tagihans->where('user_id',$user->id)->last() != null)
                                                                                            <input type="number" id="txt1" min="0" onkeyup="sum();" value="{{$user->tagihans->where('user_id',$user->id)->last()->m_ini}}" name="m_lalu" class="form-control" required>
                                                                                        @else
                                                                                            <input type="number" id="txt1" autofocus min="0" onkeyup="sum();" value="0" name="m_lalu" class="form-control" required>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="m_lalu">Meter Bulan Ini</label>
                                                                                        <input type="number" id="txt2" min="0" onkeyup="sum();" value="{{old('m_ini')}}" name="m_ini" class="form-control" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="pemakaian">Pemakaian</label>
                                                                                        <input type="number" id="txt3" min="0" onkeyup="tot();" name="pemakaian" class="form-control" required>
                                                                                    </div>
                                                                                    <script>
                                                                                        function sum() {
                                                                                            var txtFirstNumberValue = document.getElementById('txt1').value;
                                                                                            var txtSecondNumberValue = document.getElementById('txt2').value;
                                                                                            var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
                                                                                            if (!isNaN(result)) {
                                                                                                document.getElementById('txt3').value = result;
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                    <div class="form-group">
                                                                                        <label for="total">Harga Permeter</label>
                                                                                        <input type="number" name="permeter" id="txt7" value="{{$user->layanan->permeter}}" class="form-control">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="denda">Diskon</label>
                                                                                        <input type="number" id="txt5" min="0" value="0" onkeyup="tot();" name="diskon" class="form-control" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="denda">Total Bayar</label>
                                                                                        <input type="text" id="txt6"  min="0" value="{{old('total')}}" name="total" class="form-control" required>
                                                                                    </div>
                                                                                    <script>
                                                                                        function tot(){
                                                                                            var pemakaian1 = document.getElementById('txt3').value;
                                                                                            // var abodamen1 = document.getElementById('txt4').value;
                                                                                            var permeter = document.getElementById('txt7').value;
                                                                                            var denda1 = document.getElementById('txt5').value;
                                                                                            var total = parseInt(pemakaian1) * parseInt(permeter) - parseInt(denda1);
                                                                                            if(!isNaN(total)){
                                                                                                document.getElementById('txt6').value = total;
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                </div>
                                                                                <div class="form-group col-12">
                                                                                    <input type="submit" class="btn btn-primary btn-lg col-12">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </td>
                                                    <td class="text-center">
                                                       <a href="{{route('pelanggan.edit',$user->id)}}" class="btn btn-sm btn-warning">
                                                            <em class="fas fa-user-edit"></em>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7"><p style="color: red"><b>Data tidak ditemukan!</b></p></td>
                                            </tr>                                   
                                        @endif
                                    </tbody>
                                </table>
                                <div class="">{{$users->links()}}</div>
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
@endsection
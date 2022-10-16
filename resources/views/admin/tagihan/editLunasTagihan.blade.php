@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">Pembayaran</div>
        <div class="card-body col-12">
                <form action="{{route('tagihan.update', $tagihan->id)}}" method="POST">
                    @csrf
                    <div class="row">                    
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{$tagihan->user_id}}" class="form-control">
                                        <label for="nama">Transaksi ID</label>
                                        <input type="text" name="transaksiId" disabled value="{{$tagihan->transaksiID}}"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" name="bulan" id="bulan" disabled value="{{$tagihan->bulan}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="m_lalu">Meter Bulan Lalu</label>
                                        <input type="text" id="txt1" disabled value="{{$tagihan->m_lalu}}" name="m_lalu" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="name" disabled class="form-control" value="{{$tagihan->user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="number" name="tahun" disabled value="{{$tagihan->tahun}}" class="form-control"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="m_lalu">Meter Bulan Ini</label>
                                        <input type="number" id="txt2" disabled value="{{$tagihan->m_ini}}" name="m_ini" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pemakaian">Pemakaian</label>
                                        <input type="number" id="txt3" min="0" onkeyup="tot();" disabled value="{{$tagihan->pemakaian}}" name="pemakaian" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Denda</label>
                                        <input type="number" id="txt" disabled min="0" value="{{$tagihan->denda}}" onkeyup="tot();" name="denda" class="form-control" required>
                                    </div>
                                        <div class="form-group">
                                        <label for="denda">Bayar</label>
                                        <input type="number" id="txt10" autofocus  min="{{$tagihan->total}}" required onkeyup="kembalian();" name="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="denda">Diskon</label>
                                        <input type="number" id="txt5" disabled min="0" value="{{$tagihan->diskon}}" onkeyup="tot();" name="diskon" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="denda">Yang harus dibayar</label>
                                        <input type="number" id="txt9" min="" disabled value="{{$tagihan->total}}" onkeyup="kembalian();" name="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Kembalian</label>
                                        <input type="text" id="txt11"  min="0" value="" name="" class="form-control" required>
                                    </div>
                                    <script>
                                        function kembalian(){
                                            var kembalian1 = document.getElementById('txt9').value={{$tagihan->total}};
                                            var kembalian2 = document.getElementById('txt10').value;
                                            var total = parseInt(kembalian2) - parseInt(kembalian1);
                                            if(!isNaN(total)){
                                                document.getElementById('txt11').value = total;
                                            }
                                        } 
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-lg col-12">
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">Buat Tagihan</div>
        @if(session('successMsg'))
            <div class="alert alert-success col-7">
                <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                <span>
                    {{session('successMsg')}}
                </span>
            </div>
        @endif
        <div class="card-body col-12">
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
                                <input type="hidden" name="user_id" value="{{$users->id}}" class="form-control">
                                <input type="hidden" name="block" value="{{$users->alamat}}" class="form-control">
                                <input type="hidden" name="name" value="{{$users->name}}" class="form-control">
                                <input type="hidden" name="transaksiID" value="{{$tagih->count()+1}}" class="form-control">
                                <input type="hidden" name="layanan" value="{{$users->layanan_id}}" class="form-control">
                                <label for="nama">Transaksi ID</label>
                                <input type="text" name="" disabled value="ID{{$users->id}}{{$hari}}{{$bulan}}{{$tahun}}{{$tagih->count()}}"  class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="" disabled class="form-control" value="{{$users->name}}">
                            </div>
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                {{-- <input type="text" name="bulan" id="bulan" readonly class="form-control" required value="{{$month}}"> --}}
                                <select name="bulan" id="bulan" autofocus class="form-control" required>
                                    <option value=""></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" readonly value="{{$tahun}}" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label for="m_lalu">Meter Bulan Lalu</label>
                                @if ($user != null)
                                    <input type="number" id="txt1" min="0" onkeyup="sum();" value="{{$user->m_ini}}" readonly name="m_lalu" class="form-control" required>
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
                                <label for="denda">Diskon</label>
                                <input type="number" id="txt5" min="0" value=0 onkeyup="tot();" name="diskon" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pemakaian">Pemakaian</label>
                                <input type="number" id="txt3" min="0" onkeyup="tot();" readonly name="pemakaian" class="form-control" required>
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
                                <input type="number" name="permeter" id="txt7" readonly value="{{$users->layanan->permeter}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="denda">Total Bayar</label>
                                <input type="text" id="txt6"  min="0" readonly value="{{old('total')}}" name="total" class="form-control" required>
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
    </div>
@endsection
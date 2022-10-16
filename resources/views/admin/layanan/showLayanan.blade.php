@extends('layouts.app')
@push('style')
@endpush
@section('headerPage','Show Layanan')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body col-12">
        @if(session('successMsg'))
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                <span>
                    {{session('successMsg')}}
                </span>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th id="">No</th>
                        <th id="">Nama Layanan</th>
                        <th id="">Abodamen</th>
                        <th id="">Permeter</th>
                        <th colspan="" style="text-align: center" id="">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th id="">No</th>
                        <th id="">Nama Layanan</th>
                        <th id="">Abodamen</th>
                        <th id="">Permeter</th>
                        <th colspan="" style="text-align: center" id="">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if ($layanan->count())
                            @foreach ($layanan as $key=>$l)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$l->name}}</td>
                                <td>
                                    @if ($l->abodamen == null && $l->name == 'Reguler')
                                        <p>nominal tergantung pemakaian meter.</p>
                                    @endif
                                    {{$l->abodamen}}
                                </td>
                                <td>{{$l->permeter}}</td>
                                <td class="text-center">
                                    <a href="{{route('layanan.edit',$l->id)}}" class="btn btn-sm btn-warning">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                {{-- <td class="text-center">
                                    <form action="{{route('layanan.destroy',$l->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Data akan terhapus. Anda yakin ingin menghapusnya? ')" ><em class="fas fa-trash"></em></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><p style="color: red"><b>Data tidak ditemukan!</b></p></td>
                        </tr>                                   
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('src')

@endpush
@endsection
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Delete Pelanggan</title>
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

        <!-- Styles -->
        <style>
          body {
              padding-top: 20px;
              padding-bottom: 20px;
            }

            .navbar {
              margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <div class="container-fluid">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Pamsimas</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            {{-- <ul class="nav navbar-nav">
              <li class="active"><a href="{{route('index',$block->id)}}">Back to Dashboard</a></li>
            </ul> --}}
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    <div class="input-group col-8">
    <form action="{{route('superAdmin')}}" method="get">
        <input type="text" autofocus class="form-control" value="{{request('search')}}" placeholder="Search" name="search">
        {{-- <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
            </button>
        </div> --}}
    </form>
    </div>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="card overflow-auto">
          <div class="card-body">
      <table id="table-datatables" class="display table-responsive table table-hover" cellspacing="0" width="100%">
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
                    <th colspan="2" style="text-align: center" id="">Action</th>
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
                    <th colspan="2" style="text-align: center" id="">Action</th>
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
                                {{-- @if ($tagihan->status == 0 && ($tagihan->created_at->day >=  12 || $tagihan->created_at->month != $tagihan->created_at->now()->month || $tagihan->created_at->year != $tagihan->created_at->now()->year ) && $tagihan->denda == 0)
                                    <a href="{{route('tagihan.denda', $tagihan->id)}}" onclick="return confirm('Akan ditambahkan Denda. Anda yakin ingin Menambah Denda? ')">
                                        <em class="fas fa-times" style="color: rgb(236, 100, 100)"></em>
                                    </a>
                                @else --}}
                                    <p>{{$tagihan->denda}}</p>
                                {{-- @endif --}}
                            </td>
                            <td>{{$tagihan->created_at->diffForHumans()}}</td>
                            <td>{{$tagihan->total}}</td>
                            <td class="text-center">
                                @if ($tagihan->status == 0)
                                    {{-- <a href="{{route('tagihan.edit', $tagihan->id)}}"> --}}
                                        <p style="color: red">Belum Bayar</p>
                                    {{-- </a> --}}
                                @else
                                    {{-- <i class="fas fa-check" style="color: rgb(65, 255, 65)"></i> --}}
                                    <p style="color: green">Lunas</p>
                                @endif
                            </td>
                            {{-- <td class="text-center">
                                <a href="{{route('tagihan.create', $tagihan->id)}}" class="btn btn-sm btn-primary">
                                    <em class="fas fa-paper-plane"></em>
                                </a>
                            </td> --}}
                            <td class="text-center">
                                <form action="{{route('delete',$tagihan->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Data akan terhapus. Anda yakin ingin menghapusnya? ')" >Delete</button>
                                </form>
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


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<!-- ini cuman untuk bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- ini untuk datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend/button/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['print','excel']
        });
    });
</script>

    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Detail Pelanggan</title>
        <!-- Fonts -->
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
            <div class="container">

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

      <!-- Main component for a primary marketing message or call to action -->
      <table id="table-datatables" class="display table-responsive-md table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th id="">No</th>
                <th id="">Nama</th>
                <th id="">No. Hp</th>
                <th id="">Alamat</th>
                <th id="">Layanan</th>
                <th id="">bulan yang ditunggak</th>
                <th id="">Meter Terakhir</th>
                <th id="">Tunggakan</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th id="">No</th>
                <th id="">Nama</th>
                <th id="">No. Hp</th>
                <th id="">Alamat</th>
                <th id="">Layanan</th>
                <th id="">bulan yang ditunggak</th>
                <th id="">Meter Terakhir</th>
                <th id="">Tunggakan</th>
            </tr>
        </tfoot>
 
        <tbody>
            @php
                $no=1;
            @endphp
            
                @foreach ($userss as $key=>$user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->hp}}</td>
                        <td>{{$user->alamat}}</td>
                        <td>{{$user->layanan->name}}</td>
                        <td>
                          @if($user->tagihans->where('status',0)->count())
                            @foreach($user->tagihans->where('status', 0) as $tagih)
                              {{$tagih->bulan}},
                            @endforeach
                          @else
                            -
                          @endif
                        </td>
                        <td>
                          @if($user->tagihans->count())
                            {{$user->tagihans->last()->m_ini}}
                          @else
                          @endif
                        </td>
                        <td>{{$user->tagihs2()}}</td>
                    </tr>
            @endforeach
        </tbody>
      </table>

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

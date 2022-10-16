<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('backend/css/sb-admin-2.min.css')}}">
        <title>Cihaur Pamsimas</title>
        <style>
            table{
                font-size: 12px;
            }
            .link-show{
                color: black;
            }
        </style>

        <!-- Fonts -->
       
    </head>
    <body >
        <div class="container-fluid">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        @if (Auth::user()->role == 1)
                            <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @endif
                        @if (Auth::user()->role == 0)
                            <a href="{{ route('user.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success text-white">Log in</a>
                        <a href="{{ route('block') }}" class="btn btn-info text-white">Back</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                    <!-- DataTales Example -->
            <div class="card shadow mb-4 col-sm-12 col-md-12 col-12">
                <div class="card-body col-sm-12 col-md-12 col-12">
                    <!--
                        <a href="" class="btn btn-md btn-success mb-3">
                            <em class="far fa-plus-square"></em>
                        </a>
                    -->
                    {{-- <form action="{{route('index')}}" method="get" style="display: inline-block; float: right;">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" autofocus name="search2" placeholder="Cari Nama Disini" value="{{request('search2')}}">
                    </div>
                    </form> --}}
                    <div class="table-responsive">
                        <h2>{{$block->name}}</h2>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th id="">No</th>
                                    <th id="">Nama</th>
                                    {{-- <th id="">Alamat</th> --}}
                                    <th id="">Tunggakan</th>
                                    {{-- <th colspan="2" style="text-align: center" id="">Action</th> --}}
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th id="">No</th>
                                    <th id="">Nama</th>
                                    {{-- <th id="">Alamat</th> --}}
                                    <th id="">Tunggakan</th>
                                    {{-- <th colspan="2" style="text-align: center" id="">Action</th> --}}
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @if ($users->count())
                                        @foreach ($users->where('alamat',$block->name) as $user)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td><a href="{{route('show',$user->id)}}" class="link-show">{{$user->name}}</a></td>
                                            {{-- <td>{{$user->alamat}}</td> --}}
                                            <td>{{$user->tagihs2()}}</td>
                                            {{-- <td class="text-center">
                                                <a href="{{route('show', $user->id)}}" class="btn btn-sm btn-primary">
                                                    detail
                                                </a>
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
                    <p>{{$users->links()}}</p>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('backend/css/sb-admin-2.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}">
        <title>Cihaur Pamsimas</title>
        <style>
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body class="">
        <div class="container">
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

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    <a href="{{route('aturan')}}" class="btn btn-info text-white">Aturan</a>
                </div>
            @endif
            <div class="">
                <div class="row">
                    @foreach ($block as $item)
                    
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{route('index',$item->id)}}" style="text-decoration:none">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg text-center font-weight-bold text-info text-uppercase mb-1">{{$item->name}}
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-center font-weight-bold text-secondary">Jumlah : {{$users->where('alamat',$item->name)->where('role',0)->count()}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

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
            .line1{
               font-size: 50px; 
               font-weight: bold;
               color: red;
                text-align: right;
            }
            .line2{
                font-size: 60px;
                font-weight: bold;
                color:black;
                text-align:right;
            }
            .line3{
                font-size: 24px;
                font-weight: bold;
                color:red;
                text-align:right;
            }
            .headline{
                text-align: right;
            }
            ol li{
                font-size: 24px;;
            }
            .right span{
                font-weight: bold;
                font-size: 30px;
                color: green;
            }
            .right p{
                color: green;
                font-size: 16px;
            }
            .hadiah{
                color: red;
                font-weight: bold;
                font-size: 30px;
                text-align: center;
            }
            @media (max-width: 768px) {
                .line1{
                    font-size: 30px;
                }
                .line2{
                    font-size: 40px;
                }
                .line3{
                    font-size: 18px;
                }
                .headline{
                    text-align: center;
                }
                ol li{
                    font-size: 18px;
                }
                .right span{
                    font-size: 20px;
                }
                .right p{
                    font-size: 12px;
                }
                .hadiah{
                    font-size: 20px;
                }
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
        </div>
        <div class="container">            
            <div class="row">
                <div class="col-md-12 headline">
                    <span class="text-right line1">Ayoo Bayar Pamsimas Tepat Waktu...</span><br>
                    <span class="text-right line2">PAMSIMAS UNTUK MASYARAKAT</span><br>
                    <span class="text-right line3">Mari Ingatkan Tetangga KOMPAK Bayar PAMSIMAS Tepat Waktu Agar Air Tetap Mengalir</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8">
                    <h4>Keuntungan PAMSIMAS dibanding PDAM</h4>
                    <ol type="1">
                        <li>Tarif Air Lebih MURAH Sampai 3X Lipat Dari Tarip PDAM.</li>
                        <li>Pembayaran Lebih Dekat.</li>
                        <li>Respon Cepat 24 Jam Bila ada Kendala.</li>
                    </ol>
                    <h4>Ketentuan Pembayaran</h4>
                    <ol>
                        <li>Pembayaran Dilakukan Setiap Tangga 1-10.</li>
                        <li>Melebihi Tanggal 10 Dikenakan Denda Sebesar Rp. 5000,-</li>
                        <li>Pencabutan Sementara Jika Belum Melakukan Pembayaran Pada Tanggal 30</li>
                    </ol>
                </div>
                <div class="col-md-4 right">
                    <p>
                        <span>UNDIAN PAMSIMAS</span> <br>
                        6X Pembayaran Lancar = 1 Kupon UNDIAN <br>
                        10X Pembayaran Lancar = 2 Kupon Undian <br>
                        <span>Di Undi Desember 2022</span>
                        <div class="row">
                            <div class="col-sm-6"><img src="{{asset('image/tv.png')}}" width="100%" alt="Hadiah Utama"></div>
                        <div class="col-sm-6 hadiah">HADIAH UTAMA</div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

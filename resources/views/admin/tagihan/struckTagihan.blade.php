<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Pamsimas</title>
</head>
<body>
    <table>
        <tr>
            <td colspan="3" style="text-align: center">
                <b>
                    RINCIAN PEMBAYARAN <br>
                    ==========================
                </b>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td>Transaksi ID</td>
            <td>:</td>
            <td>{{$tagihan->transaksiID}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$tagihan->user->name}}</td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{$tagihan->bulan}}</td>
        </tr>
        <tr>
            <td>Meter Bulan Lalu</td>
            <td>:</td>
            <td>{{$tagihan->m_lalu}} M<sup>3</sup> </td>
        </tr>
        <tr>
            <td>Meter Bulan Ini</td>
            <td>:</td>
            <td>{{$tagihan->m_ini}} M<sup>3</sup></td>
        </tr>
        <tr>
            <td>Pemakaian</td>
            <td>:</td>
            <td>{{$tagihan->pemakaian}} M<sup>3</sup></td>
        </tr>
        <tr>
            <td>Harga / M<sup>3</sup></td>
            <td>:</td>
            <td>Rp. {{$tagihan->user->layanan->permeter}},-</td>
        </tr>
        <tr>
            <td>Abodamen</td>
            <td>:</td>
            <td>Rp. {{$tagihan->abodamen}},-</td>
        </tr>
        <tr>
            <td>Diskon</td>
            <td>:</td>
            <td>Rp. {{$tagihan->diskon}},-</td>
        </tr>
        <tr>
            <td>Denda</td>
            <td>:</td>
            <td>Rp. {{$tagihan->denda}},-</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td>Rp. {{$tagihan->total}},-</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <b>
                    ========================== <br>
                    Terima Kasih  <br>
                    PAMSIMAS SEKAR MANDIRI JAYA <a href="{{route('tagihan.index',$tagihan->user_id)}}" style="text-decoration-style: none">DESA CIHAUR</a>
                </b>
            </td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>


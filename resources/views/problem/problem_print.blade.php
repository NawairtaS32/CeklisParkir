<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="120" />
    {{--  <meta name="keywords" content="">  --}}
    <meta name="author" content="Satriawan Nawairtas">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--  font-awesome --}}
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.0.0-web/css/all.min.css') }}">

<style>
    .main{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: "Times New Roman", Times, serif;
        text-transform: capitalize;
        
    }

    .judul{
        font-size: 32px;
        text-align: center;
    }
    .user table tr td{
        border: none;
    }

    .content table{
        text-align: center;
    }

    .content .daken, th, td{
        padding: 2px;
        border: 2px solid;
    }

    footer table tr td{
        width: 200px;
        border: none;
    }


</style>
</head>
<body class="main">
    <div class="print_all container ">
        <div class="judul">
            Laporan Kondisi Kendaraan problem
        </div>
        <br><br>
        <div class="user">
            <span>
                Saya yang bertanda tangan dibawah ini :
            </span>
            <table>
                <tr>
                    <td>Nama Petugas</td>
                    <td>:</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ Auth::user()->nik }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ Auth::user()->jabatan }}</td>
                </tr>
                <tr>
                    <td>Lokasi Kerja</td>
                    <td>:</td>
                    <td>{{ Auth::user()->lokasi_kerja }}</td>
                </tr>
            </table>
            <span>

            </span>
        </div>
        <br>
        <div class="content">
            <table class="daken">
                <tr>
                    <td>No</td>
                    <td>Tanggal Pembuatan</td>
                    <td>Nama</td>
                    <td>nik</td>
                    <td>Nopol</td>
                    <td>kejadian</td>
                    <td>Lokasi kejadian</td>
                </tr>

                @foreach ($data_problem as $key=>$data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->waktu }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->nopol }}</td>
                            <td>{{ $data->kejadian }}</td>
                            <td>{{ $data->users->lokasi_kerja }}</td>
                        </tr>   
                    @endforeach
            </table>
            <br>
            <div class="jumlah">
                jumlah problem :  {{$jumlah_problem}}
            </div>
        </div>
        <br><br>

        <footer>
            <table>
                <tr>
                    <td>
                        Jakarta, .......................
                    </td>
                </tr>
                <tr>
                    <td>
                        Pengawas Petugas Parkir
                    </td>
                    <td>

                    </td>
                    <td> 
                        Central Park Manager
                    </td>
                    <td>

                    </td>
                    <td> 
                        Area Business Manager
                    </td>
                </tr>
                <br><br><br>
                <tr>
                    <td>
                        (.............................)
                    </td>
                    <td>

                    </td>
                    <td>
                        (.............................)
                    </td>
                    <td>

                    </td>
                    <td>
                        (.............................)
                    </td>
                    
                </tr>

            </table>
        </footer>
    </div>
</body>

</html>
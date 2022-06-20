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
            Laporan Data Kendaraan Motor
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
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Petugas</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Nopol</th>
                    <th>Type</th>
                    <th>Spion</th>
                    <th>Ban</th>
                    <th>Area</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Kejadian</th>
                    <th>Status Kendaraan</th>
                </tr>
                @foreach ($data_motor as $key=>$datas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $datas->waktu }}</td>
                        <td>{{$datas->users->panggilan}}</td>
                        <td>{{$datas->users->nik}}</td>
                        <td>{{$datas->users->jabatan}}</td>
                        <td class="upercase">{{ $datas->nopol }}</td>
                        <td>{{ $datas->type }}</td>
                        <td>{{ $datas->spion }}</td>
                        <td>{{ $datas->ban }}</td>
                        <td class="upercase">{{ $datas->area_parkir}}</td>
                        <td>{{$datas->users->lokasi_kerja}}</td>
                        <td>{{ $datas->kondisi }}</td>
                        <td>
                            @if(!empty($datas->problems->kejadian))
                                {{$datas->problems->kejadian}}
                            @endif
                        </td>
                        <td>{{ $datas->status }}</td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div class="jumlah">
                jumlah motor :  {{$jumlah_motor}}
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
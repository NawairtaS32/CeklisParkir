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
            Laporan Kondisi Kendaraan Mobil
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
                    <th>kejadian</th>
                    <th>Status Kendaraan</th>
                </tr>
                @foreach ($data_mobil as $key=>$data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->waktu }}</td>
                        <td>{{$data->users->panggilan}}</td>
                        <td>{{$data->users->nik}}</td>
                        <td>{{$data->users->jabatan}}</td>
                        <td class="upercase">{{ $data->nopol }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->spion }}</td>
                        <td>{{ $data->ban }}</td>
                        <td class="upercase">{{ $data->area_parkir}}</td>
                        <td>{{$data->users->lokasi_kerja}}</td>
                        <td>{{ $data->kondisi }}</td>
                        <td>
                            @if(!empty($data->problems->kejadian))
                                {{$data->problems->kejadian}}
                            @endif
                        </td>
                        <td>{{$data->status}}</td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div class="jumlah">
                jumlah mobil :  {{$jumlah_mobil}}
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
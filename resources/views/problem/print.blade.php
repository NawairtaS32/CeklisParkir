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

    <!-- Styles -->
    {{--  <link href="../public/css/print-problem.css" rel="stylesheet">  --}}

    <!-- jquery -->
    <script type="text/javascript" src="{{ asset ('jquery-3.6.0.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset ('js/main.js') }}" defer></script>

    <style>
        .print-problem{
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", Times, serif;
            letter-spacing: 2px;
        }
        .print-problem .judul{
            text-align: center;
        }
        .print-problem .content{
            font-size: 14px;
            text-align: justify;
        }
        .print-problem footer table{
            width: 100%;
        }
        .print-problem footer table tr td{
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="print-problem">
        <div class="judul">
            <h1>
                SURAT TANDA BUKTI LAPOR
            </h1>
            <h4>
                No:.../SPI-GMN/20..
            </h4>
        </div>

        <div class="content">
            <p class="pembukaan">
                Yang bertanda tangan dibawah ini menerangkan bahwa pada tanggal {{$problem->waktu }}
                telah datang kekantor Secure Parking seorang {{$problem->jk }}
                Warga Negara {{$problem->negara }} dengan identitas sebagai berikut:
            </p>
            <table class="table-client">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$problem->name }}</td>
                </tr>

                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{$problem->nik }}</td>
                </tr>

                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{$problem->agama }}</td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{$problem->status }}</td>
                </tr>

                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{$problem->pekerjaan }}</td>
                </tr>

                <tr>
                    <td>No Tlp</td>
                    <td>:</td>
                    <td>{{$problem->tlp }}</td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$problem->alamat }}</td>
                </tr>           
            </table>

            <div class="judul">
                <h2>
                    Melaporkan
                </h2>
            </div>

            <p class="kronologi">
                Mengaku telah terjadi peristiwa : <br>
                pada Lokasi {{ $problem->users->lokasi_kerja}} dengan nomor polisi kendaraan {{$problem->nopol }} telah terjadi {{ $problem->kejadian}}. 
                Menjelaskan {{ $problem->kronologi}}
            </p>

            <div class="judul">
                <h2>
                    Penanganan kejadian di area parkir
                </h2>
            </div>

            <p class="kronologi">
                {{ $problem->penanganan}}
            </p>

            <p class="penutup">
                Demikian surat tanda bukti lapor ini dibuat untuk kepeluan yang sebagaimana mestinya, atas perhatianya saya ucapkan terimaksi.
            </p>

            <footer>
                <table>
                    <tr>
                        <td>
                            Jakarta, .......................
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pelapor
                        </td>
                        <td>

                        </td>
                        <td> 
                            Pengawas Petugas Parkir
                        </td>
                    </tr>
                    <br><br><br>
                    <tr>
                        <td>
                            ( {{$problem->name }} )
                        </td>
                        <td>

                        </td>
                        <td>
                            ( {{ $problem->users->name}} )
                        </td>
                    </tr>

                </table>
            </footer>

        </div>
    </div>
</body>

</html>
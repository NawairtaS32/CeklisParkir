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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">

    <!-- jquery -->
    <script type="text/javascript" src="{{ asset ('jquery-3.6.0.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset ('js/main.js') }}" defer></script>
<style>
    body{
        font-size: 18px;
    }
    .subJudul{
        font-size: 32px;
        text-align: center;
        margin-bottom: 50px 
    }
    .user{
        text-transform: capitalize;
        line-with: 1.8;
        line-height: 1.8;
        later-spacing;2px;
    }
    span{
        font-size: 20px;
    }

    .table tr td{
        text-transform: capitalize;
        line-with: 1.8;
        line-height: 1.8;
        later-spacing;2px;
    }
    
    .table tr .judul{
        width: 320px;
        text-align: left;
    }

    footer table tr td{
        width: 200px;
        border: none;
    }

</style>
</head>
<body>
    <div class="kendaraan-print container ">
        <div class="show" id="gambar">
            <div class="subJudul">
                Detail Kendaraan Mobil
            </div>
            
            <div class="user">
                <span>
                    Saya yang bertanda tangan dibawah ini :
                </span>
                <table>
                    <tr>
                        <td class="judul">Nama Petugas</td>
                        <td>:</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td class="judul">NIK</td>
                        <td>:</td>
                        <td>{{ Auth::user()->nik }}</td>
                    </tr>
                    <tr>
                        <td class="judul">Jabatan</td>
                        <td>:</td>
                        <td>{{ Auth::user()->jabatan }}</td>
                    </tr>
                    <tr>
                        <td class="judul">Lokasi Kerja</td>
                        <td>:</td>
                        <td>{{ Auth::user()->lokasi_kerja }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <span>
                Kondisi Kendaraan
            </span>
            <table class="table">

                @if(!empty($mobil->problems->name))
                    <tr>
                        <td class="judul">Pemilik Kendaraan</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->name}}
                        </td>
                    </tr>
                @endif

                <tr>
                    <td class="judul">Nopol Kendaraan</td>
                    <td>:</td>
                    <td>{{$mobil->nopol }}</td>
                </tr>

                @if(!empty($mobil->problems->no_stnk))
                    <tr>
                        <td class="judul">No STNK</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->no_stnk}}
                        </td>
                    </tr>
                @endif
                
                @if(!empty($mobil->problems->j_kendaraan))
                    <tr>
                        <td class="judul">Jenis Kendaraan</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->j_kendaraan}}
                            </td>
                    </tr>  
                @endif

                <tr>
                    <td class="judul">Type Kendaraan</td>
                    <td>:</td>
                    <td >{{$mobil->type }}</td>
                </tr>
                <tr>
                    <td class="judul">Nama Petugas</td>
                    <td>:</td>
                    <td>{{$mobil->users->name}}</td>
                </tr>
                <tr>
                    <td class="judul">Jabatan</td>
                    <td>:</td>
                    <td>{{$mobil->users->jabatan}}</td>
                </tr>
                <tr>
                    <td class="judul">Lokasi Parkir</td>
                    <td>:</td>
                    <td>{{$mobil->users->lokasi_kerja}}</td>
                </tr>
                <tr>
                    <td class="judul">Tanggal Ceklist Kendaraan</td>
                    <td>:</td>
                    <td>{{ $mobil->waktu }}</td>
                </tr>
                <tr>
                    <td class="judul">Kondisi Spion</td>
                    <td>:</td>
                    <td >{{$mobil->spion}}</td>
                </tr>
                <tr>
                    <td class="judul">Kondisi Ban kendraan</td>
                    <td>:</td>
                    <td >{{$mobil->ban}}</td>
                </tr>
                <tr>
                    <td class="judul">Area Pakir Kendaraan</td>
                    <td>:</td>
                    <td >{{$mobil->area_parkir}}</td>
                </tr>
                <tr>
                    <td class="judul">Kondisi Kendaraan</td>
                    <td>:</td>
                    <td>{{$mobil->kondisi}}</td>
                </tr>

                @if(!empty($mobil->problems->kejadian))
                    <tr>
                        <td class="judul">Kejadian</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->kejadian}}
                            </td>
                    </tr>  
                @endif

                @if(!empty($mobil->problems->kronologi))
                    <tr>
                        <td class="judul">Kronologi kejadian</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->kronologi}}
                            </td>
                    </tr>  
                @endif

                @if(!empty($mobil->problems->penanganan))
                    <tr>
                        <td class="judul">Penanganan kejadian</td>
                        <td>:</td>
                        <td>
                                {{$mobil->problems->penanganan}}
                            </td>
                    </tr>  
                @endif

                <tr>
                    <td class="judul">status Kendaraan</td>
                    <td>:</td>
                    <td>{{$mobil->status}}</td>
                </tr>
            </table>
            <br>
            <span>
                Demikian Laporan kondisi kendaraan di area parkir {{ Auth::user()->lokasi_kerja }}, saya buat dengan sebenar-benarnya
                sebagai bahan pertanggung jawaban saya sehingga dapat dipergunakan sebagaimana mestinya, atas perhatinya saya ucapkan terimakasih.
            </span>
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
                    </tr>
    
                </table>
            </footer>
        </div>
    </div>
</body>

</html>
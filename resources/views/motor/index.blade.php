@extends('layouts.app')

@section('title','Data Motor')

@push('page-styels')
@endpush

@section('content')
@if (count($data_motor))
    <div class="kendaraan container">

        @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session::get('pesan')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif 

        <div class="subJudul">Data Kendaraan Motor</div>

        <div class="subMenu">
            <div class="btn-group" role="group" aria-label="Basic example">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="btn btn-success tambah" href="{{route('motor.create')}}" role="button">
                        Tambah
                    </a>
                @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                    <a class="btn btn-success tambah" href="{{route('motor.create')}}" role="button">
                        Tambah
                    </a>
                @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cetakmotor">
                        Cetak
                    </button> 
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filtermotor">
                    Pencarian
                </button>
            </div>
        </div>

        <!-- Modal cetak data-->
        <div class="modal fade" id="cetakmotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-table modal-content">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Cetak Data motor</span>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('motor.motor_print')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="" name="tanggal_awal" id="tanggal_awal" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                s/d
                            </div>  
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="" name="tanggal_akhir" id="tanggal_akhir" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="tombol">
                                <button type="submit" class="btn btn-primary">
                                    Cetak
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>                                     
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  

        <!-- Modal fliter data -->
        <div class="modal fade" id="filtermotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-table modal-content motor_cetak">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Pencarian Data motor</span>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('motor.index')}}" method="GET" class="d-flex">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari nopol/type/status pada data kendaraan motor" name="cari" id="cari">
                                <button class="btn btn-outline-primary" id="cari" type="submit">
                                    <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                                </button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        
        
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead class="thead-dark mr-2">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nopol</th>
                        <th>Merek</th>
                        <th>Petugas</th>
                        <th>Area</th>
                        <th>lokasi</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_motor as $key=>$datas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datas->waktu }}</td>
                            <td>{{ $datas->nopol }}</td>
                            <td>{{ $datas->type }}</td>
                            <td>{{$datas->users->panggilan}}</td>
                            <td>{{ $datas->area_parkir}}</td>
                            <td>{{$datas->users->lokasi_kerja}}</td>
                            <td>{{ $datas->status }}</td>
                            <td>
                                <form action="{{ route('motor.destroy',$datas->id) }}" method="POST">

                                    @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')

                                        <a class="btn btn-info btn-sm" href="{{ route('motor.show',$datas->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('motor.edit',$datas->id) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('motor.print',$datas->id) }}">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data kendaraan ini?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                        
                                    @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                                        <a class="btn btn-info btn-sm" href="{{ route('motor.show',$datas->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('motor.edit',$datas->id) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>                                
                                    @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                                        <a class="btn btn-info btn-sm" href="{{ route('motor.show',$datas->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>  
                                        
                                        <a class="btn btn-primary btn-sm" href="{{ route('motor.print',$datas->id) }}">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    @endif
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>

        <br><br>

        <div class="info">
            Jumlah Data: {{ $data_motor->total() }}<br>
            Halaman : {{ $data_motor->currentPage() }}<br>
            Data perhalaman: {{ $data_motor->perPage() }}<br>
            <br>
            {{ $data_motor->links() }}

            <br><br>
        </div>
    </div>
@else
    <div class="container alert alert-warning">
        <h2>
            data {{$cari}} tidak ditemukan
        </h2>
        <a class="btn btn-secondary" href="{{ route('motor.index') }}">kembali</a>
    </div>
@endif

@endsection

@push('page-scripts')


@endpush
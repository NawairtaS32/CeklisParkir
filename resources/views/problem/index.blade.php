@extends('layouts.app')

@section('title','Data problem')

@push('page-styels')
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('css/problem.css') }}">  --}}
@endpush

@section('content')
@if (count($data_problem))
    <div class="problem container">
        
         @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session::get('pesan')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif 

        <div class="subJudul">
            <span>Data Kendaraan Masalah Di Area Parkir</span>
        </div>

        <div class="subMenu">
            <div class="btn-group" role="group" aria-label="Basic example">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="btn btn-success tambah" href="{{route('problem.create')}}" role="button">
                        Tambah
                    </a>
                @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                    <a class="btn btn-success tambah" href="{{route('problem.create')}}" role="button">
                        Tambah
                    </a>
                @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cetakproblem">
                        Cetak
                    </button> 
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterproblem">
                    Pencarian
                </button>
            </div>
        </div>

        <!-- Modal cetak data-->
        <div class="modal fade" id="cetakproblem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class=" modal-table modal-content">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Cetak Data problem</span>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('problem.problem_print')}}" enctype="multipart/form-data">
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
        <div class="modal fade" id="filterproblem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class=" modal-table modal-content">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Pencarian Data problem</span>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('problem.index')}}" method="GET" class="d-flex">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari nopol/type/status pada data kendaraan problem" name="cari" id="cari">
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
            <table class="table table-striped table-sm">
                <thead class="thead-dark mr-2">
                    <tr>
                        <td>No</td>
                        <td>Tanggal Pembuatan</td>
                        <td>Nama</td>
                        <td>nik</td>
                        <td>Nopol</td>
                        <td>kejadian</td>
                        <td>Lokasi kejadian</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_problem as $key=>$data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->waktu }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->nopol }}</td>
                            <td>{{ $data->kejadian }}</td>
                            <td>{{ $data->users->lokasi_kerja }}</td>
                            <td>
                                <form action="{{ route('problem.destroy',$data->id) }}" method="POST">
    
                                    <a class="btn btn-info btn-sm" href="{{ route('problem.show',$data->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>         
                                    <a class="btn btn-primary btn-sm" href="{{ route('problem.edit',$data->id) }}">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('problem.print',$data->id) }}">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data kendaraan ini?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>

        <br><br>
        <div class="info">
            Jumlah Data: {{ $data_problem->total() }}<br>
            Halaman : {{ $data_problem->currentPage() }}<br>
            Data perhalaman: {{ $data_problem->perPage() }}<br>
            <br>
            {{ $data_problem->links() }}

            <br><br>
        </div>
    </div>
@else
    <div class="container alert alert-warning">
        <h2>
            data {{$cari}} tidak ditemukan
        </h2>
        <a class="btn btn-secondary" href="{{ route('problem.index') }}">kembali</a>
    </div>
@endif

@endsection

@push('page-scripts')
@endpush
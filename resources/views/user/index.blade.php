@extends('layouts.app')

@section('title','users Petugas')

@push('page-styels')
@endpush

@section('content')

@if (count($data_user))
    <div class="user container" id="main"> 

        @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session::get('pesan')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif 

        <div class="subJudul">
            Data Petugas Parkir
        </div>   

        <div class="subMenu">
            <div class="btn-group" role="group" aria-label="Basic example">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="btn btn-success tambah" href="{{route('user.create')}}" role="button">
                        Tambah
                    </a>
                @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                    <a class="btn btn-success tambah" href="{{route('user.create')}}" role="button">
                        Tambah
                    </a>
                @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cetakuser">
                        Cetak
                    </button> 
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filteruser">
                    Pencarian
                </button>
            </div>
        </div>

        <!-- Modal cetak data-->
        <div class="modal fade" id="cetakuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Cetak Data user</span>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{route('user.user_print')}}" enctype="multipart/form-data">
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
        <div class="modal fade" id="filteruser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content user_cetak">
                    <div class="modal-header">
                        <span class="modal-title" id="exampleModalLongTitle">Pencarian Data user</span>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.index')}}" method="GET" class="d-flex">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari nama/nik pada data user" name="cari" id="cari">
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
            <table class="table table-striped ">
                <thead class="header">
                    <tr>
                        <th>No</th>
                        <th>tanggal</th>
                        <th>Nama</th>
                        <th>Nik</th>
                        <th>jabatan</th>
                        <th>jenis kelamin</th>
                        <th>email</th>
                        <th>lokasi_kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="bodyTabel">
                    @foreach ($data_user as $key=>$users)
                        <tr>
                            <td class="nomor">{{ $loop->iteration }}</td>
                            <td>{{ $users->waktu }}</td>
                            <td>{{ $users->panggilan }}</td>
                            <td>{{ $users->nik }}</td>
                            <td>{{ $users->jabatan}}</td>
                            <td>{{ $users->jk }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->lokasi_kerja }}</td>
                            <td>
                                <form action="{{ route('user.destroy',$users->id) }}" method="POST">

                                    <a class="btn btn-info btn-sm" href="{{ route('user.show',$users->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>          
                                    <a class="btn btn-primary btn-sm" href="{{ route('user.edit',$users->id) }}">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus users PETUGAS ini?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </dir>

        <div class="info">
            Jumlah Data: {{ $data_user->total() }}<br>
            Halaman : {{ $data_user->currentPage() }}<br>
            Data perhalaman: {{ $data_user->perPage() }}<br>
            <br>
            {{ $data_user->links() }}
        </div>
    </div>
@else
    <div class="container alert alert-warning">
        <h2>
            data {{$cari}} tidak ditemukan
        </h2>
        <a class="btn btn-secondary" href="{{ route('user.index') }}">kembali</a>
    </div>
@endif
@endsection

@push('page-scripts')

@endpush
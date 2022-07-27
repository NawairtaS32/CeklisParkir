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

        <span class="subJudul">Data Petugas Parkir</span>   

        <div class="row justify-content-md-center menu">
            
            <div class="col-sm-8 col-4">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="btn btn-primary" href="{{route('user.create')}}" role="button">Tambah Data</a>
                @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <a class="btn btn-success" href="{{route('user.user_print')}}" role="button">Cetak Data</a>
                @endif
            </div>

            <div class="col-sm-4 col-8">
                <form action="{{route('user.index')}}" method="GET" class="d-flex">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Petugas" name="cari" id="cari">
                        <button class="btn btn-outline-secondary" id="cari" type="submit">Search</button>
                    </div>
                </form>
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

        <div class="row justify-content-md-center pagination p-2">
            @if($data_user->hasPages())
            <div class="card-footer">
                    jumlah user :  {{$jumlah_user}}
                    {{ $data_user->links() }}
                </div>
            @endif
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
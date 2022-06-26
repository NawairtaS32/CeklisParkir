@extends('layouts.app')

@section('title','Data Mobil')

@push('page-styels')
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('css/mobil.css') }}">  --}}
@endpush

@section('content')
@if (count($data_mobil))
    <div class="kendaraan container">
        
         @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session::get('pesan')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif 

        <div class="subJudul">
            <span>Data Kendaraan Mobil</span>
        </div>

        <div class="row justify-content-md-center menu">
            <div class="col-4">
                @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                    <a class="btn btn-success tambah" href="{{route('mobil.create')}}" role="button">Tambah Data Mobil</a>
                @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                    <a class="btn btn-success tambah" href="{{route('mobil.create')}}" role="button">Tambah Data Mobil</a>
                @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                    <a class="btn btn-primary tambah" href="{{route('mobil.mobil_print')}}" role="button">Cetak Data Mobil</a>     
                @endif
            </div>

            <div class="col-8">
                <form action="{{route('mobil.index')}}" method="GET" class="d-flex">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Cari Data Kendaraan Mobil" name="cari" id="cari">
                        <button class="btn btn-outline-secondary" id="cari" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>  
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-striped table-sm">
                <thead class="thead-dark mr-2">
                    <tr>
                        <th>No</th>
                        <th>tanggal</th>
                        <th>Nopol</th>
                        <th>Merek</th>
                        <th>Petugas</th>
                        <th>Area</th>
                        <th>lokasi</th>
                        <th>Status Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_mobil as $key=>$data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->waktu}}</td>
                            <td class="upercase">{{ $data->nopol }}</td>
                            <td>{{ $data->type }}</td>
                            <td>{{$data->users->panggilan}}</td>
                            <td class="upercase">{{ $data->area_parkir}}</td>
                            <td>{{$data->users->lokasi_kerja}}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <form action="{{ route('mobil.destroy',$data->id) }}" method="POST">
                                    @if (Auth::check() && Auth::user()->jabatan == 'Pengawas Petugas Parkir')
                                        <a class="btn btn-info btn-sm" href="{{ route('mobil.show',$data->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>         
                                        <a class="btn btn-primary btn-sm" href="{{ route('mobil.edit',$data->id) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('mobil.print',$data->id) }}">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data kendaraan ini?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    @elseif (Auth::check() && Auth::user()->jabatan == 'Staff Petugas Lapangan')
                                        <a class="btn btn-info btn-sm" href="{{ route('mobil.show',$data->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>         
                                        <a class="btn btn-primary btn-sm" href="{{ route('mobil.edit',$data->id) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                    @else (Auth::check() && Auth::user()->jabatan == 'Central Park Manager')
                                        <a class="btn btn-info btn-sm" href="{{ route('mobil.show',$data->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>  
                                        <a class="btn btn-primary btn-sm" href="{{ route('mobil.print',$data->id) }}">
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

        <div class="row justify-content-md-center pagination p-2 info">
            
            @if($data_mobil->hasPages())
            <div class="card-footer">
                    jumlah mobil :  {{$jumlah_mobil}}
                    {{ $data_mobil->links() }}
                </div>
            @endif
        </div>
    </div>
@else
    <div class="container alert alert-warning">
        <h2>
            data {{$cari}} tidak ditemukan
        </h2>
        <a class="btn btn-secondary" href="{{ route('mobil.index') }}">kembali</a>
    </div>
@endif

@endsection

@push('page-scripts')
@endpush
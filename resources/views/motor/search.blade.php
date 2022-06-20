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
            
                <div class="row justify-content-md-center menu">
                    <div class="col col-sm-8">
                        <a class="btn btn-primary" href="{{route('motor.create')}}" role="button">Tambah Data Motor</a>
                    </div>

                    <div class="col col-sm-2">
                        <form action="{{route('motor.search')}}" method="GET" class="d-flex">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Data Kendaraan Mobil" name="cari" id="cari">
                                <button class="btn btn-outline-secondary" id="cari" type="submit">Search</button>
                            </div>
                        </form>
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
                        <th>kondisi</th>
                        <th>Keterangan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_motor as $key=>$datas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datas->date }}</td>
                            <td>{{ $datas->nopol_mtr }}</td>
                            <td>{{ $datas->merk_mtr }}</td>
                            <td>{{$datas->users->panggilan}}</td>
                            <td>{{ $datas->area_parkir}}</td>
                            <td>{{ $datas->lokasi_parkir }}</td>
                            <td>{{ $datas->kondisi }}</td>
                            <td>{{ $datas->status }}</td>
                            <td>
                                <form action="{{ route('motor.destroy',$datas->id) }}" method="POST">
        
                                    <a class="btn btn-info btn-sm" href="{{ route('motor.show',$datas->id) }}">Show</a>
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data kendaraan ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>

            <div class="row justify-content-md-center pagination p-2">
                <div class="col col-sm-9">
                    <span class="">
                        jumlah mobil :  {{$jumlah_motor}}
                    </span>
                </div>

                <div class="col col-sm-2">
                    {{ $data_motor->links() }}
                </div>
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
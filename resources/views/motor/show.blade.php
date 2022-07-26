@extends('layouts.app')

@section('title','Data Detail Motor')

@push('page-styels')
@endpush

@section('content')
    <div class="kendaraan-show container">

        <div class="show" id="gambar">

            <div class="subJudul">
                <span>
                    Detail Kondisi Kendaraan Motor
                </span>
            </div>

            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset ('imgMtr/' .$motor->gb_depan) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMtr/' .$motor->gb_kanan) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMtr/' .$motor->gb_belakang) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMtr/' .$motor->gb_kiri) }}" alt="" >
                    </div>
                </div>
                
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <div class="img720p">
                <div class="row">
                    <div class="col-sm-5" id="gambar">
                        <img title="Gambar Kondisi Depan Motor" src="{{ asset ('imgMtr/' .$motor->gb_depan) }}" alt="Gambar tidak tersedia" class="rounded" >
                        <img title="Gambar Kondisi kanan Motor" src="{{ asset ('imgMtr/' .$motor->gb_kanan) }}" alt="Gambar tidak tersedia" class="rounded"  >
                    </div>
                    <div class="col-sm-5" id="gambar">
                        <img  title="Gambar Kondisi belakang Motor" src="{{ asset ('imgMtr/' .$motor->gb_belakang) }}" alt="Gambar tidak tersedia" class="rounded" >
                        <img  title="Gambar Kondisi kiri Motor" src="{{ asset ('imgMtr/' .$motor->gb_kiri) }}" alt="Gambar tidak tersedia" class="rounded" >
                    </div>
                </div>
            </div>


            <br>
            <div class="card">
                <div class="card-header">
                    <span>
                        Data Petugas
                    </span>
                </div>
                <ul class="list-group">
                    <li  class="list-group-item">{{ $motor->users->name }}</li>
                    <li  class="list-group-item">{{ $motor->users->nik }}</li>
                    <li  class="list-group-item">{{ $motor->users->jabatan}}</li>
                </ul>
                <div class="card-header">
                    <span>
                        Data Kondisi Kendaraan
                    </span>
                </div>
                <ul class="list-group">
                    <li  class="list-group-item">{{ $motor->nopol }}</li>
                    @if(!empty($motor->problems->no_stnk))
                    <li  class="list-group-item">{{$motor->problems->no_stnk}}</li>
                    @endif
                    <li  class="list-group-item"> {{ $motor->type }}</li>
                    <li  class="list-group-item">{{ $motor->spion }}</li>
                    <li  class="list-group-item">{{ $motor->users->lokasi_kerja}}</li>
                    <li  class="list-group-item">{{ $motor->area_parkir }}</li>
                    <li  class="list-group-item">{{ $motor->status }}</li>
                    <li  class="list-group-item">{{ $motor->kondisi }}</li>
                    <li  class="list-group-item">{{ $motor->ket }}</li>
                    <li  class="list-group-item">
                        @if(!empty($motor->problems->waktu))
                        pada
                            {{$motor->problems->waktu}}
                        @endif
                        @if(!empty($motor->problems->kejadian))
                        telah terjadi 
                            {{$motor->problems->kejadian}}
                        @endif
                        @if(!empty($motor->problems->kronologi))
                        dengan kronologi
                            {{$motor->problems->kronologi}}
                        @endif
                    </li>
                </ul>
                
            </div>
            <div class="tombol">
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <a class="btn btn-primary" href="{{route('motor.index')}}"> Back</a>
                    </div>
                    <div class="col-sm-6 col-6">
                        <a class="btn btn-warning" href="{{ route('motor.edit',$motor->id) }}">Edit</a>
                    </div>
                </div>
            </div>

            <br><br><br>
            <br><br><br>
        </div>

    </div
@endsection

@push('page-scripts')

@endpush
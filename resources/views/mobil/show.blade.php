@extends('layouts.app')

@section('title','Data Detail Mobil')

@push('page-styels')
@endpush

@section('content')
    <div class="kendaraan-show container ">
        <div class="show" id="gambar">
            <div class="subJudul">
                <span>
                    Detail Kondisi Kendaraan Mobil
                </span>
            </div>

            <div class="img720p">
                <div class="row">
                    <div class="col-sm-5" id="gambar">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_depan) }}" alt="" >
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_kanan) }}" alt="" >
                    </div>
                    <div class="col-sm-5" id="gambar">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_belakang) }}" alt="" >
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_kiri) }}" alt="" >
                    </div>
                </div>
            </div>

            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_depan) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_kanan) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_belakang) }}" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset ('imgMbl/' .$mobil->gb_kiri) }}" alt="" >
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

            <div class="card">
                <div class="card-header">
                    <span>
                        Data Petugas
                    </span>
                </div>
                <ul class="list-group">
                    <li  class="list-group-item">{{ $mobil->users->name }}</li>
                    <li  class="list-group-item">{{ $mobil->users->nik }}</li>
                    <li  class="list-group-item">{{ $mobil->users->jabatan}}</li>
                </ul>
                <div class="card-header">
                    <span>
                        Data  Kendaraan
                    </span>
                </div>
                <ul class="list-group">
                    <li  class="list-group-item">{{ $mobil->nopol }}</li>
                    @if(!empty($mobil->problems->no_stnk))
                    <li  class="list-group-item">{{$mobil->problems->no_stnk}}</li>
                    @endif
                    <li  class="list-group-item"> {{ $mobil->type }}</li>
                    <li  class="list-group-item">{{ $mobil->spion }}</li>
                    <li  class="list-group-item">{{ $mobil->users->lokasi_kerja}}</li>
                    <li  class="list-group-item">{{ $mobil->area_parkir }}</li>
                    <li  class="list-group-item">{{ $mobil->status }}</li>
                    <li  class="list-group-item">{{ $mobil->kondisi }}</li>
                    <li  class="list-group-item">
                        @if(!empty($mobil->problems->waktu))
                        pada
                            {{$mobil->problems->waktu}}
                        @endif
                        @if(!empty($mobil->problems->kejadian))
                        telah terjadi 
                            {{$mobil->problems->kejadian}}
                        @endif
                        @if(!empty($mobil->problems->kronologi))
                        dengan kronologi
                            {{$mobil->problems->kronologi}}
                        @endif
                    </li>
                    <li  class="list-group-item">{{ $mobil->ket }}</li>
                </ul>
            </div>

            <div class="tombol">
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <a class="btn btn-primary" href="{{route('mobil.index')}}"> Back</a>
                    </div>
                    <div class="col-sm-6 col-6">
                        <a class="btn btn-warning" href="{{ route('mobil.edit',$mobil->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection

@push('page-scripts')

@endpush
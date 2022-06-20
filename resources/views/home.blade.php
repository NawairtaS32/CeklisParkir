@extends('layouts.app')

@section('content')
    <div class="container" id="mainHome">

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <img src="{{ asset('gambar/mobil.jpg') }}" class="card-img-top" alt="#">
                    <div class="card-body">
                        <span class="card-title">Mobil</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Lot Parkir area Mobil: 180lot </li>
                        <li class="list-group-item">
                            <ul>Tarif parkir Mobil
                                <li>
                                    1 jam pertama: Rp 5.000,-
                                </li >
                                <li >
                                    1 jam berikutnya: Rp 5.000,-
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item">
                            <p>
                                Bila ticket karcis parkir hilang maka dikenakan
                                denda Rp 50.000,-
                            </p>
                        </li>
                    </ul>
                    <br>
                    <a href="{{ route('mobil.index') }}" class="btn btn-primary">Data Kendaran Mobil</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('gambar/motor.jpg') }}" class="card-img-top" alt="#">
                        <div class="card-body">
                            <span class="card-title">Motor</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lot Parkir area Motor: 320lot </li>
                            <li class="list-group-item">
                                <ul>Tarif parkir Motor
                                    <li>
                                        1 jam pertama: Rp 2.000,-
                                    </li>
                                    <li>
                                        1 jam berikutnya: Rp 3.000,-
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <p>
                                    Bila ticket karcis parkir hilang maka dikenakan
                                    denda Rp 25.000,-
                                </p>
                            </li>
                        </ul>
                        <br>
                        <a href="{{ route('motor.index') }}" class="btn btn-primary">Data Kendaraan Motor</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">
                    <div class="card" style="width: 24rem;">
                        <img src="{{ asset('gambar/kendala.jpg') }}" class="card-img-top" alt="#">
                        <div class="card-body">
                            <span class="card-title">Poblem</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Proses penganan kecelakaan di area parkir</li>
                            <li class="list-group-item">Proses penaganan Kehilangan di area parkir</li>
                            <li class="list-group-item">Proses Penangkapan Tindak Kejahatan</li>
                        </ul>
                        <br>
                        <a href="{{ route('problem.index') }}" class="btn btn-primary">Data Kendala/Poblem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

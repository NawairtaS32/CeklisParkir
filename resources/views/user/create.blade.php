@extends('layouts.app')

@section('title','Tambah Data Petugas')

@push('page-styels')
    <link rel="stylesheet" type="text/css" href="{{asset('css/user.css') }}">
@endpush

@section('content')
    <div class="user-create container">
        <div class="card">
            <div class="card-header ">
                <span>Tambah User</span>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Nama User</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Nama Panggilan User</label>
                                <input type="text" class="form-control" name="panggilan" value="{{ old('panggilan') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="nik">Nik User</label>
                                <input type="text" class="form-control" name="nik" value="{{ old('nik') }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="tlp">No Tlp/HP User</label>
                                <input type="text" class="form-control" name="tlp" value="{{ old('tlp') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="agama">Agama</label>
                                <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-Laki" checked>
                                    <label class="form-check-label" for="jk">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                    <label class="form-check-label" for="jk">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="status"> Status Hubungan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="belum kawin" checked>
                                    <label class="form-check-label" for="status">Belum Kawin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="kawin">
                                    <label class="form-check-label" for="status">Kawin</label>
                                </div>
                            </div>
                            <div class="form-group">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="lokasi_kerja">Lokasi Kerja</label>
                                <input type="text" class="form-control" name="lokasi_kerja" value="{{ old('lokasi_kerja') }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="jabatan">Jabatan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jabatan" value="Staff Petugas Lapangan" checked>
                                    <label class="form-check-label" for="jabatan">Staff Petugas Lapangan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jabatan" value="Pengawas Petugas Parkir">
                                    <label class="form-check-label" for="jabatan">Pengawas Petugas Parkir</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jabatan" value="Central Park Manager">
                                    <label class="form-check-label" for="jabatan">Central Park Manager</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="gb_user">Foto Profile user</label>
                                <input type="file" class="form-control" name="gb_user">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" name="password" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="password_confirmation">Ulangi kembali password</label>
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="tombol">
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <a class="btn btn-success" href="{{route('user.index')}}"> 
                                    Back
                                </a>
                            </div>
                            <div class="col-sm-6 col-6">
                                <button type="submit" class="btn btn-primary">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection

@push('page-scripts')

@endpush
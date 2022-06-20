@extends('layouts.app')

@section('title','Tambah Data Motor')

@push('page-styels')
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('css/user.css') }}">  --}}
@endpush

@section('content')
    <div class="user-create container">
        <div class="card">
            <div class="card-header">
                <h4>Update User</h4>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">Nama User</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="panggilan">Nama Panggilan User</label>
                                <input type="text" class="form-control" name="panggilan" value="{{$user->panggilan}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="nik">Nik User</label>
                                <input type="text" class="form-control" name="nik" value="{{$user->nik}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="tlp">No Tlp/HP User</label>
                                <input type="text" class="form-control" name="tlp" value="{{$user->tlp}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="agama">Agama</label>
                                <input type="text" class="form-control" name="agama" value="{{$user->agama}}">
                            </div>agama
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-Laki">
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
                                    <input class="form-check-input" type="radio" name="status" value="belum kawin">
                                    <label class="form-check-label" for="status">Belum Kawin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" >
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
                                <input type="text" class="form-control" name="lokasi_kerja" value="{{$user->lokasi_kerja}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{$user->alamat}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="label" for="jabatan">Jabatan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jabatan" value="Staff Petugas Lapangan">
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
                                <img class="image" style="width: 140px" src="{{ asset ('imgUser/' . $user->gb_user) }}" alt="" >
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
                        <button type="submit" class="btn btn-success">Simpan</button> 
                        <a href="/user" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection

@push('page-scripts')

@endpush

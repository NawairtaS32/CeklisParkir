@extends('layouts.app')

@section('title','Tambah Data Masalah')

@section('content')
<div class="problem-create container">
    <div class="card">
        <div class="card-header text-sm-center ">
            <span>Berita Acara Penanganan</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('problem.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="nik">NIK KTP :</label>
                            <input type="text" class="form-control" placeholder="" name="nik" id="nik" value="{{ old('nik') }}" >
                            @foreach ( $errors->get('nik') as $msg)
                            <p class="text-danger">{{$msg}} </p>       
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="negara">Negara :</label>
                            <input type="text" class="form-control" placeholder="" name="negara" id="negara" value="{{ old('negara') }}" >
                            @foreach ( $errors->get('negara') as $msg)
                            <p class="text-danger">{{$msg}} </p>       
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <label class="label" for="name">Nama Customer :</label>
                            <input type="text" class="form-control" placeholder="" name="name" id="name" value="{{ old('name') }}" >
                            @foreach ( $errors->get('name') as $msg)
                            <p class="text-danger">{{$msg}} </p>       
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="agama">Agama :</label>
                            <input type="text" class="form-control" placeholder="" name="agama" id="agama" value="{{ old('agama') }}" >
                            @foreach ( $errors->get('agama') as $msg)
                            <p class="text-danger">{{$msg}} </p>       
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="pekerjaan">Pekerjaan :</label>
                            <input type="text" class="form-control" placeholder="" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" >
                            @foreach ( $errors->get('pekerjaan') as $msg)
                            <p class="text-danger">{{$msg}} </p>       
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <label class="label" for="tlp">No Tlp/HP User</label>
                            <input type="text" class="form-control" name="tlp" value="{{ old('tlp') }}">
                            @foreach ( $errors->get('tlp') as $msg)
                                <p class="text-danger">harus di isi </p>            
                            @endforeach
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="jk">Jenis Kelamin</label>
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
                    <div class="col-sm-6">
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
                    </div>
                </div>

                <div class="form-group">
                    <label class="label" for="gb_customer">Foto Profile Customer</label>
                    <input type="file" class="form-control" name="gb_customer">
                    @foreach ( $errors->get('gb_customer') as $msg)
                        <p class="text-danger">harus di isi </p>            
                    @endforeach
                </div>

                <div class="form-group">        
                    <label class="label" for="alamat">Alamat : </label>
                    <input type="text" class="form-control" name="alamat" id="alamat" rows="3" value="{{ old('alamat') }}"></input>
                    @foreach ( $errors->get('alamat') as $msg)
                        <p class="text-danger">harus di isi </p>            
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label class="label" for="nopol"> Nopol :</label>
                            <input type="text" class="form-control" placeholder="" name="nopol" id="nopol" value="{{ old('nopol') }}" >
                            @foreach ( $errors->get('nopol') as $msg)
                                <p class="text-danger">harus di isi </p>            
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="no_stnk"> Nomor stnk:</label>
                                <input type="text" class="form-control" placeholder="" name="no_stnk" id="no_stnk" value="{{ old('no_stnk') }}" >
                                @foreach ( $errors->get('no_stnk') as $msg)
                                    <p class="text-danger">harus di isi </p>            
                                @endforeach
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="j_kendaraan"> Jenis Kendaraan:</label>
                                <input type="text" class="form-control" placeholder="" name="j_kendaraan" id="j_kendaraan" value="{{ old('j_kendaraan') }}" >
                                @foreach ( $errors->get('j_kendaraan') as $msg)
                                    <p class="text-danger">harus di isi </p>            
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label" for="kejadian">Kejadian :</label>
                                <input type="text" class="form-control" placeholder="" name="kejadian" id="kejadian" value="{{ old('kejadian') }}" >
                                @foreach ( $errors->get('kejadian') as $msg)
                                    <p class="text-danger">harus di isi </p>            
                                @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">        
                    <label class="label" for="kronologi">Kronologi : </label>
                    <input type="text" class="form-control" name="kronologi" id="kronologi" rows="6" value="{{ old('kronologi') }}"></input>
                    @foreach ( $errors->get('kronologi') as $msg)
                        <p class="text-danger">harus di isi </p>            
                    @endforeach
                </div>

                <div class="form-group">        
                    <label for="penanganan"> Penanganan kejadian :  </label>
                    <input type="text" class="form-control" name="penanganan" id="penanganan" rows="6" value="{{ old('penanganan') }}"></input>
                    @foreach ( $errors->get('penanganan') as $msg)
                        <p class="text-danger">harus di isi </p>            
                    @endforeach
                </div>
        
                <div class="row tombol">
                    <div class="col-sm-6 col-6">
                        <a class="btn btn-success" href="{{route('problem.index')}}"> 
                            Back
                        </a>
                    </div>
                    <div class="col-sm-6 col-6">
                        <button type="submit" class="btn btn-primary">
                            Next
                        </button>
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
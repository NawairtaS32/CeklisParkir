@extends('layouts.app')

@section('title','Tambah Data Masalah')

@section('content')
<div class="problem-create container">
    <div class="card">
        <div class="card-header text-sm-center ">
            <span>Tambah Data Masalah</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('problem.update', $problem->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="nik">NIK KTP :</label>
                            <input type="text" class="form-control" placeholder="" name="nik" id="nik" value="{{$problem->nik}}" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="negara">Negara :</label>
                            <input type="text" class="form-control" placeholder="" name="negara" id="negara" value="{{$problem->negara}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="form-group">
                            <label class="label" for="name">Nama Customer :</label>
                            <input type="text" class="form-control" placeholder="" name="name" id="name" value="{{$problem->name}}" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-group">
                            <label class="label" for="agama">Agama :</label>
                            <input type="text" class="form-control" placeholder="" name="agama" id="agama" value="{{$problem->agama}}" >
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="pekerjaan">Pekerjaan :</label>
                            <input type="text" class="form-control" placeholder="" name="pekerjaan" id="pekerjaan" value="{{$problem->pekerjaan}}" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="tlp">No Tlp/HP User</label>
                            <input type="text" class="form-control" name="tlp" value="{{$problem->tlp}}">
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="jk">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="Laki-Laki" >
                                <label class="form-check-label" for="jk">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                <label class="form-check-label" for="jk">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label for="status"> Status Hubungan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="belum kawin">
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
                    <img class="image" style="width: 140px" src="{{ asset ('imgProblem/' . $problem->gb_customer) }}" alt="" >
                </div>

                <div class="form-group">        
                    <label class="label" for="alamat">Alamat : </label>
                    <input type="text" class="form-control" name="alamat" id="alamat" rows="3" value="{{$problem->alamat}}"></input>
                    
                </div>

                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                        <label class="label" for="nopol"> Nopol :</label>
                            <input type="text" class="form-control" placeholder="" name="nopol" id="nopol" value="{{$problem->nopol}}" >
                            
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="no_stnk"> Nomor stnk:</label>
                                <input type="text" class="form-control" placeholder="" name="no_stnk" id="no_stnk" value="{{$problem->no_stnk}}" >
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="j_kendaraan"> Jenis Kendaraan:</label>
                                <input type="text" class="form-control" placeholder="" name="j_kendaraan" id="j_kendaraan" value="{{$problem->j_kendaraan}}" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="form-group">
                            <label class="label" for="kejadian">Kejadian :</label>
                                <input type="text" class="form-control" placeholder="" name="kejadian" id="kejadian" value="{{$problem->kejadian}}" >
                        </div>
                    </div>
                </div>

                <div class="form-group">        
                    <label class="label" for="kronologi">Kronologi : </label>
                    <input type="text" class="form-control" name="kronologi" id="kronologi" rows="6"  value="{{$problem->kronologi}}"></input>
                </div>

                <div class="form-group">        
                    <label for="penanganan">Penanganan Kondisi Kendaraan :  </label>
                    <input type="text" class="form-control" name="penanganan" id="penanganan" rows="6" value="{{$problem->penanganan}}"></input>
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
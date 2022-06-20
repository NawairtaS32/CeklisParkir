@extends('layouts.app')

@section('title','Edit Data Motor')

@push('page-styels')
    <link rel="stylesheet" type="text/css" href="{{asset('css/motor.css') }}">
@endpush

@section('content')
<div class="kendaraan-create container">
    <div class="card">
        <div class="card-header text-sm-center ">
            <span>Edit Data Motor</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('motor.update', $motor->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="nopol">Nomor polisi Kendaraan :</label>
                                <input type="text" class="form-control" placeholder="" name="nopol" id="nopol" value="{{ $motor->nopol }}" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="type">Type Kendaraan</label>
                            <input type="text" class="form-control" placeholder="" name="type" id="type" value="{{ $motor->type }}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="area_parkir">Area Parkir</label>
                            <input type="text" class="form-control" placeholder="" name="area_parkir" id="area_parkir" value="{{ $motor->area_parkir }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                         
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Depan :</label><br>
                                <input type="file" id="gb_depan"  name="gb_depan" value="{{ old('gb_depan') }}" >
                                <img class="image" style="width: 140px" src="{{ asset ('imgMtr/' . $motor->gb_depan) }}" alt="" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Kanan :</label><br>
                            <input type="file" id="gb_kanan"  name="gb_kanan" value="{{ old('gb_kanan') }}">
                            <img class="image" style="width: 140px" src="{{ asset ('imgMtr/' . $motor->gb_kanan) }}" alt="" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Belakang :</label><br>
                            <input type="file" id="gb_belakang"  name="gb_belakang" value="{{ old('gb_belakang') }}">
                            <img class="image" style="width: 140px" src="{{ asset ('imgMtr/' . $motor->gb_belakang) }}" alt="" >

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Kiri :</label><br>
                            <input type="file" id="gb_kiri"  name="gb_kiri" value="{{ old('gb_kiri') }}">
                            <img class="image" style="width: 140px" src="{{ asset ('imgMtr/' . $motor->gb_kiri) }}" alt="" >
                        </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="ban">Kondisi Ban</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ban" value="baik">
                                <label class="form-check-label" for="ban">Baik</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ban" value="kurang angin">
                                <label class="form-check-label" for="ban">Kurang angin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ban" value="bocor">
                                <label class="form-check-label" for="ban">Bocor</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="spion">Kondisi Spion</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spion" value="baik" >
                                <label class="form-check-label" for="spion">Baik</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spion" value="rusak">
                                <label class="form-check-label" for="spion">Rusak</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spion" value="baret atau penyok">
                                <label class="form-check-label" for="spion">baret atau penyok</label>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="kondisi">Kondisi Kendaraan  </label>
                            <textarea class="form-control" name="kondisi" id="kondisi" rows="3" value="{{ old('kondisi') }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="status">Status Kendaraan</label>
                            <textarea class="form-control" placeholder="" name="status" id="status" value="{{ old('status') }}" rows="3"></textarea>
                        </div>
                    </div>
                </div>                

                <div class="form-group">        
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" placeholder="" name="ket" id="ket" value="{{ old('ket') }}" rows="3"></textarea>
                </div>
        
                <div class="tombol">
                    <a class="btn btn-success" href="{{route('mobil.index')}}"> 
                        <i class="fas fa-angle-left"></i>
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Next
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
@endsection

@push('page-scripts')

@endpush
@extends('layouts.app')

@section('title','Tambah Data Motor')

@push('page-styels')
@endpush

@section('content')
<div class="kendaraan-create container">
    <div class="card">
        <div class="card-header text-sm-center ">
            <span>Tambah Data Motor</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('motor.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="nopol">Nomor polisi Kendaraan :</label>
                                <input type="text" class="form-control" placeholder="" name="nopol" id="nopol" value="{{ old('nopol') }}" >
                                @foreach ( $errors->get('nopol') as $msg)
                                <p class="text-danger">sebelum mengisi cek nopol sudah ada atau belum ada </p>        
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="type">Type Kendaraan</label>
                            <input type="text" class="form-control" placeholder="" name="type" id="type" value="{{ old('type') }}" >
                            @foreach ( $errors->get('type') as $msg)
                                <p class="text-danger">isi lah sesuai prosedur </p>              
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="area_parkir">Area Parkir</label>
                            <input type="text" class="form-control" placeholder="" name="area_parkir" id="area_parkir" value="{{ old('area_parkir') }}">
                            @foreach ( $errors->get('area_parkir') as $msg)
                                <p class="text-danger">isi lah sesuai prosedur </p>             
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Depan :</label><br>
                                <input type="file" class="form-control" id="gb_depan"  name="gb_depan" value="{{ old('gb_depan') }}" >
                                @foreach ( $errors->get('gb_depan') as $msg)
                                    <p class="text-danger">Ambilah gambar sesuai dengan prosedur </p>           
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Kanan :</label><br>
                            <input type="file" class="form-control" id="gb_kanan"  name="gb_kanan" value="{{ old('gb_kanan') }}">
                                @foreach ( $errors->get('gb_kanan') as $msg)
                                    <p class="text-danger">Ambilah gambar sesuai dengan prosedur </p>               
                                @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Belakang :</label><br>
                            <input type="file" class="form-control" id="gb_belakang"  name="gb_belakang" value="{{ old('gb_belakang') }}">
                                @foreach ( $errors->get('gb_belakang') as $msg)
                                    <p class="text-danger">Ambilah gambar sesuai dengan prosedur </p>             
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Kondisi Bagian Kiri :</label><br>
                            <input type="file" class="form-control" id="gb_kiri"  name="gb_kiri" value="{{ old('gb_kiri') }}">
                            @foreach ( $errors->get('gb_kiri') as $msg)
                            <p class="text-danger">Ambilah gambar sesuai dengan prosedur </p>                
                            @endforeach
                        </div>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="kondisi">Kondisi Kendaraan  </label>
                            <input type="text" class="form-control" name="kondisi" id="kondisi" rows="3" value="{{ old('kondisi') }}"></input>
                            @foreach ( $errors->get('kondisi') as $msg)
                            <p class="text-danger">Isilah sesuai dengan prosedur </p>              
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">        
                            <label for="status">Status Kendaraan</label>
                            <input type="text" class="form-control" placeholder="" name="status" id="status" value="{{ old('status') }}"></input>
                            @foreach ( $errors->get('status') as $msg)
                                <p class="text-danger">isi lah sesuai prosedur </p>            
                            @endforeach
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="ban">Kondisi Ban</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ban" value="baik" checked>
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
                                <input class="form-check-input" type="radio" name="spion" value="baik" checked>
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

                <div class="form-group">        
                    <label for="ket">Keterangan</label>
                    <input type="text" class="form-control" placeholder="" name="ket" id="ket" value="{{ old('ket') }}"></input>
                    @foreach ( $errors->get('ket') as $msg)
                        <p class="text-danger">harus di isi </p>            
                    @endforeach
                </div>
        
                <div class="tombol">
                    <a class="btn btn-success" href="{{route('motor.index')}}"> 
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

@endsection

@push('page-scripts')

@endpush
@extends('layouts.app')

@section('title','Detail problem Petugas')

@push('page-styels')
@endpush

@section('content')
<div class="problem-show container">
    <div class="card">
        <img class="image" src="{{ asset ('imgProblem/' .$problem->	gb_customer) }}" alt="" >
        <span  class="list-group-item">{{ $problem->date}}</span>
        <div class="card-header">
            <a class="title" id="title1">
                Data Customer
            </a>
        </div>
        <ul class="list-group">
            <li  class="list-group-item">{{ $problem->name }}</li>
            <li  class="list-group-item">{{ $problem->nik }}</li>
            <li  class="list-group-item">{{ $problem->status }}</li>
            <li  class="list-group-item">{{ $problem->jk }}</li>
            <li  class="list-group-item">{{ $problem->tlp }}</li>
            <li  class="list-group-item">{{ $problem->alamat }}</li>
        </ul>
        <div class="card-header">
            <a class="title" id="title2">
                Data petugas
            </a>
        </div>
        <ul class="list-group" id="menu2">
            <li  class="list-group-item">{{ $problem->users->name}}</li>
            <li  class="list-group-item">{{ $problem->users->nik}}</li>
            <li  class="list-group-item">{{ $problem->users->jabatan}}</li>
        </ul>

        <div class="card-header">
            <a class="title" id="title3">
                Data Kendaraan
            </a>
        </div>
        <ul class="list-group">
            <li  class="list-group-item">Jenis kendaraan {{ $problem->j_kendaraan}} dengan nopol {{ $problem->nopol}} 
                type 
                @if(!empty($problem->mobils->type))
                    {{$problem->mobils->type}}
                @endif
                @if(!empty($problem->motors->type))
                    {{$problem->motors->type}}
                @endif
                yang terpakir pada 
                @if(!empty($problem->mobils->waktu))
                {{$problem->mobils->waktu}}
                @endif
                @if(!empty($problem->motors->waktu))
                    {{$problem->motors->waktu}}
                @endif
                di area parkir
                @if(!empty($problem->mobils->area_parkir))
                {{$problem->mobils->area_parkir}}
                @endif
                @if(!empty($problem->motors->area_parkir))
                    {{$problem->motors->area_parkir}}
                @endif
                pada lokasi {{ $problem->users->lokasi_kerja}}
                Telah terjadi kejadian {{ $problem->kejadian}}
            </li>

        </ul>
        
        <div class="card-header">
            <a class="title" id="title3">
                Kronologi Kejadian
            </a>
        </div>
        <ul class="list-group" id="menu3">
            <li  class="list-group-item">{{ $problem->kronologi}}</li>
        </ul>
        <div class="card-header">
            <a class="title" id="title3">
                penanganan Kejadian
            </a>
        </div>
        <ul class="list-group" id="menu3">
            <li  class="list-group-item">{{ $problem->penanganan}}</li>
        </ul>
        <div class="tombol">
            <a class="btn btn-primary" href="{{route('problem.index')}}"> Back</a>
            <a class="btn btn-warning" href="{{ route('problem.edit',$problem->id) }}">Edit</a>
        </div>
    </div>
</div>
<br><br><br>
@endsection

@push('page-scripts')
    
@endpush
@extends('layouts.app')

@section('title','Detail user Petugas')

@push('page-styels')
@endpush

@section('content')
<div class="userShow container">
    <div class="card">
      <img class="image" src="{{ asset ('imgUser/' .$user->	gb_user) }}" alt="" >
      <div class="card-header text-right">
        <span>{{ $user->panggilan }}</span><br>
        <span>{{ $user->nik }}</span>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ $user->name }}</li>
        <li class="list-group-item">{{ $user->agama }}</li>
        <li class="list-group-item">{{ $user->status }}</li>
        <li class="list-group-item">{{ $user->jabatan}}</li>
        <li class="list-group-item">{{ $user->jk }}</li>
        <li class="list-group-item">{{ $user->tlp }}</li>
        <li class="list-group-item">{{ $user->email }}</li>
        <li class="list-group-item">{{ $user->lokasi_kerja }}</li>
        <li class="list-group-item">{{ $user->alamat }}</li>
      </ul>
      <div class="card-body">
        <div class="tombol">
          <a href="/user" class="btn btn-warning">BACK</a>
        </div>
      </div>
    </div>
</div>
<br><br><br>
@endsection

@push('page-scripts')

@endpush
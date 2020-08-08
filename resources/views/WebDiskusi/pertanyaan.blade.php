@extends('layout/blank')

@section('title', 'Pertanyaan')

@section('container')
    
    <h2>Pertanyaan</h2>
    @if (session('status_udah'))
        <div class="alert alert-success">
            {{ session('status_udah') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    <a href="/pertanyaan/create" class="btn btn-primary px-5 my-3">Tambah pertanyaan</a>
    <ul class="list-group">
      	@foreach($pertanyaans as $pertanyaan)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
              <h5>{{ $pertanyaan->isi }}</h6>
              <h6 class="text-muted">{{ $pertanyaan->tanggal_dibuat }}</h6>
              <h6 class="text-muted">{{ $pertanyaan->tanggal_diperbaharui }}</h6>
            </span>
            <a href="/pertanyaan/{{ $pertanyaan->profile_id }}" class="badge badge-primary badge-pill">Detail</a>
          </li>
        @endforeach
    </ul>
@endsection
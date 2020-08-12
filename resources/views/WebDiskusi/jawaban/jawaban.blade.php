@extends('layout/blank')

@section('title', 'Create')

@section('container')
    
    <h2 class="mx-5">Jawaban Pertanyaan</h2>
    <ul class="list-group">
      	@foreach($jawabans as $jawaban)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <h5>{{ $jawaban->isi }}</h6>
              <h6 class="text-muted">{{ $jawaban->tanggal_dibuat }}</h6>
              <h6 class="text-muted">{{ $jawaban->tanggal_diperbaharui }}</h6>
            </span>
            <a href="/jawaban/{{ $jawaban->id_jawaban }}" class="badge badge-primary badge-pill">Pertanyaan</a>
          </li>
        @endforeach
    </ul>


@endsection

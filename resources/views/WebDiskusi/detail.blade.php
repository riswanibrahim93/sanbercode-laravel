@extends('layout/blank')

@section('title', 'Detail')

@section('container')
    
      <div class="card m-auto" style="width: 25rem;">
       
        <div class="card-body">
          <h5 class="card-title">{{ $detail->judul }}</h5>
          <h6 class="card-text">{{ $detail->name }}</h6>
          <h6 class="card-text">{{ $detail->email }}</h6>
          <p class="card-text">{{ $detail->isi }}</p>
          <h6 class="card-subtitle mb-2 text-muted">{{ $detail->tanggal_dibuat }}</h6>
          <h6 class="card-subtitle mb-2 text-muted">{{ $detail->tanggal_diperbaharui }}</h6>

          <a href="{{$detail->id_pertanyaan}}/edit" class="btn btn-primary mr-1">Ubah</a>
          <form action="{{$detail->id_pertanyaan}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger mr-1">Hapus</button>
          </form>
          <a href="/pertanyaan" class="card-link mr-1">Kembali</a>
        </div>
      </div>

@endsection

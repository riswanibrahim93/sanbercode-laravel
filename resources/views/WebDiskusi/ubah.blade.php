@extends('layout/blank')

@section('title', 'Create')

@section('container')
    
    <h2 class="mx-5">Tambah Pertanyaan</h2>
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    @if (session('status_done'))
        <div class="alert alert-success">
            {{ session('status_done') }}
        </div>
    @endif
      <form method="POST" action="../{{$id}}" class="mx-5">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"  name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"  name="judul" placeholder="Masukkan Judul" value="{{ old('judul') }}">
        </div>
        <div class="form-group">
          <label for="isi">Isi</label>
          <textarea class="form-control @error('isi') is-invalid @enderror" id="isi"  name="isi" value="{{ old('isi') }}"></textarea>
        </div>
        <button type="submit" class="btn btn-danger ">Tambah</button>
        <a class="btn btn-primary float-right" href="/pertanyaan">kembali</a>
      </form>

@endsection
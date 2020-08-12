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
      <form method="POST" action="/pertanyaan" class="mx-5">
        @csrf
        
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"  name="judul" placeholder="Masukkan Judul" value="{{ old('judul') }}">
        </div>
        <div class="form-group">
          <label for="isi">Isi</label>
          <textarea class="form-control @error('isi') is-invalid @enderror" id="isi"  name="isi" value="{{ old('isi') }}"></textarea>
        </div>
        <div class="form-group">
          <label for="tag">Tags</label>
          <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag"  name="tag" placeholder="Masukkan tag, bila lebih dari satu pisahkan dengan koma" value="{{ old('tag') }}">
        </div>
        <button type="submit" class="btn btn-danger ">Tambah</button>
        <a class="btn btn-primary float-right" href="/pertanyaan">kembali</a>
      </form>


@endsection

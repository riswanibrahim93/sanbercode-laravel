@extends('layout/blank')

@section('title', 'Create')

@section('container')
    
    <h2 class="mx-5">Dari Pertanyaan</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$pertanyaan->isi}}
      </li>
    </ul>


@endsection

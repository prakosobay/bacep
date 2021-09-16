@extends('layouts.barang')
@section('title', 'Barang Masuk')
@section('content')
<div class="wrapper">
  <h1>Barang Masuk</h1>

  @if (session('success'))
  <div class="alert-success">
    <p>{{ session('success') }}</p>
  </div>
  @endif

  @if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form method="POST" action="{{ url('barang', $post->id ) }}">
    @csrf
    @method('PUT')
    <input name="title" value="{{ $post->title }}" type="text" placeholder="Title...">
    <input name="body" value="{{ $post->body }}" type="text" placeholder="Body...">
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection

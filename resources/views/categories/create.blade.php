@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Kategori</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama kategori</label>
                    <input type="text" class="form-control" id="name_categories" name="name_categories" placeholder="Nama kategori">
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-md-6">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                    <div class="d-grid gap-2 col-md-6">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
        </form>
    </div>
@endsection

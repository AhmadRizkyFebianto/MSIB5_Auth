@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Edit Kategori</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.update', $categories->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama kategori</label>
                    <input type="text" class="form-control" id="name_categories" name="name_categories" placeholder="Nama kategori" value="{{ $categories->name_categories }}" >
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-md-6">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                    <div class="d-grid gap-2 col-md-6">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

        </form>
    </div>
@endsection

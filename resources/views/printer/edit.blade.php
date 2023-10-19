@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Edit Printer</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('printer.update', $printer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col mb-3">
                    <label for="category_id">Merek</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Pilih Merek</option>
                        @foreach ( $categories as $cg )
                            <option value="{{ $cg->id }}">{{ $cg->name_categories }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" id="category_id" name="category_id" placeholder="merek" value="{{ $printer->categories->name_categories }}"> --}}
                </div>
                <div class="col mb-3">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="model" value="{{ $printer->model }}">
                </div>
                <div class="col mb-3">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="harga" value="{{ $printer->price }}">
                </div>
                <div class="col mb-3">
                    <label for="stock_quantity">Stock</label>
                    <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="stock" value="{{ $printer->stock_quantity }}">
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-md-6">
                        <button type="submit" class="btn btn-success">update</button>
                    </div>
                    <div class="d-grid gap-2 col-md-6">
                        <a href="{{ route('printer.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
        </form>
    </div>
@endsection

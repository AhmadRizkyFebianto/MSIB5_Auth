@extends('dashboard')

@section('content')
    <h2>Data Kategori</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $category->name_categories }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2" role="group" aria-label="Basic example">
                            <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
@endsection

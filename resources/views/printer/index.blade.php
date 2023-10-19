@extends('dashboard')

@section('content')
    <h2>Data Printer</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Merek</th>
                <th class="text-center">Model</th>
                <th class="text-center">Price</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($printer as $index => $printers)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $printers->categories->name_categories }}</td>
                    <td>{{ $printers->model }}</td>
                    <td>{{ $printers->price }}</td>
                    <td>{{ $printers->stock_quantity }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2" role="group" aria-label="Basic example">
                            <a href="{{ route('printer.edit', $printers->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('printer.destroy', $printers->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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

    <a href="{{ route('printer.create') }}" class="btn btn-success">Tambah Printer</a>
@endsection

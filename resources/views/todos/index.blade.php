@extends('layouts')
@section('content')
    <div class="row">
        <div class="col-xl-8 m-auto shadow">
            <h2 class="my-3 text-center">Repository + Service Design Pattern</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @elseif ($message = Session::get('error'))
                <div class="alert alert-danger">{{ $message }}</div>
            @endif

            <form action="{{ route('todos.store') }}" method="POST">
                @csrf

                {{-- Title  --}}
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Title" id="title" name="title">

                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description  --}}
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" placeholder="Description" id="description" name="description"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

            {{-- List out the todos  --}}
            <table class="table table-striped mt-5 border">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Descriptions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todos as $todo)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td class="d-flex justify-between">
                                <a class="btn btn-primary btn-sm" href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-3">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No todo found!</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection

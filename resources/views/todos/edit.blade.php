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

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Title  --}}
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{$todo->title}}">

                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description  --}}
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" placeholder="Description" id="description" name="description">{{$todo->description}}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4 mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection

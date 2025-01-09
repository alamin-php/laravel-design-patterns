@extends('layouts')

@section('content')
    <div class="container">
        <h2>Create Account Ledger</h2>
        <form action="{{ route('product_types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Type Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Product Type</label>
                <select style="padding: 2px 0px" class="form-control select2 p-4" id="parent_id" name="parent_id">
                    @foreach ($productTypes as $type)
                        <option value="{{ $type->id }}" @if ($type->id == 1) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Ledger</button>
            <a href="{{ route('product_types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

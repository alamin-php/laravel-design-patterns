@extends('layouts')

@section('content')
    <div class="container">
        <h2>Product Type</h2>
        <a href="{{ route('product_types.create') }}" class="btn btn-primary mb-3">Add New</a>
        {{-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <ul>
                    @foreach ($nestedProductTypes as $type)
                        @include('product_type._productTypeRow', ['type' => $type])
                    @endforeach
                </ul>
            </tbody>
        </table> --}}


        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nestedProductTypes as $productType)
                    <!-- Render Primary Group row only when parent_id is null -->
                    <tr style="{{ $productType->parent_id === null ? 'display:none;' : '' }}">
                        <td>{{ $productType->name }}</td>
                        <td>{{ $productType->parent_id ? $productType->parent->name : 'None' }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection

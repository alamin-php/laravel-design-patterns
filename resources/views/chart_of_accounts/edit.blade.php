@extends('layouts')

@section('title', 'Edit Account')

@section('content')
    <div class="container">
        <div class="shadow p-4 mt-5 col-md-8 mx-auto rounded">
            <h1>Edit Account: {{ $account->name }}</h1>

            <form action="{{ route('chart_of_accounts.update', $account) }}" method="POST" class="mb-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="{{ $account->name }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="Asset" {{ $account->type == 'Asset' ? 'selected' : '' }}>Asset</option>
                        <option value="Liability" {{ $account->type == 'Liability' ? 'selected' : '' }}>Liability</option>
                        <option value="Income" {{ $account->type == 'Income' ? 'selected' : '' }}>Income</option>
                        <option value="Expense" {{ $account->type == 'Expense' ? 'selected' : '' }}>Expense</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Account</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">None</option>
                        @foreach ($accounts as $parent)
                            <option value="{{ $parent->id }}" {{ $account->parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="code">Account Code</label>
                    <input type="text" name="code" id="code" value="{{ $account->code }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ $account->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Account</button>
                <a href="{{ route('chart_of_accounts.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
            @if ($account->isDeletable)
                <form action="{{ route('chart_of_accounts.destroy', $account) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this account?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </form>
            {{-- @else
                <button class="btn btn-secondary" disabled>Cannot Delete</button> --}}
            @endif
        </div>
    </div>
@endsection

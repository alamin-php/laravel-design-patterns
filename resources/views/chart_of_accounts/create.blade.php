@extends('layouts')

@section('title', 'Create Account')

@section('content')
<div class="container">
    <h1>Create a New Account</h1>

    <form action="{{ route('chart_of_accounts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Account Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type">Account Type</label>
            <select name="type" id="type" class="form-control">
                <option value="">Select a Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent Account</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">No Parent (Root Account)</option>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="form-group">
            <label for="code">Account Code</label>
            <input type="text" name="code" id="code" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div> --}}

        <button type="submit" class="btn btn-primary mt-3">Create Account</button>
        <a href="{{ route('chart_of_accounts.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection

@extends('layouts')

@section('content')
<div class="container">
    <h2>Create Account Ledger</h2>
    <form action="{{ route('account_ledgers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ledger_name" class="form-label">Ledger Name</label>
            <input type="text" class="form-control" id="ledger_name" name="ledger_name" required>
        </div>
        <div class="mb-3">
            <label for="chart_of_accounts_id" class="form-label">Chart of Account</label>
            <select style="padding: 2px 0px" class="form-control select2 p-4" id="chart_of_accounts_id" name="chart_of_accounts_id" required>
                <option value="">Select Chart of Account</option>
                @foreach($chartOfAccounts as $account)
                <option value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Ledger</button>
        <a href="{{ route('account_ledgers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

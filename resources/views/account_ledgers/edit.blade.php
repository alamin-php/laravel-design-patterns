@extends('layouts')

@section('content')
    <div class="container">
        <h2>Edit Account Ledger</h2>
        <form action="{{ route('account_ledgers.update', $accountLedger) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ledger_name" class="form-label">Ledger Name</label>
                <input type="text" class="form-control" id="ledger_name" name="ledger_name"
                    value="{{ old('ledger_name', $accountLedger->ledger_name) }}" required>
            </div>
            <div class="mb-3">
                <select class="form-control select2" id="chart_of_accounts_id" name="chart_of_accounts_id" required>
                    <option value="">Select Chart of Account</option>
                    @foreach($chartOfAccounts as $account)
                        <option
                            value="{{ $account->id }}"
                            {{ isset($accountLedger) && $accountLedger->chart_of_accounts_id == $account->id ? 'selected' : '' }}>
                            {{ $account->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $accountLedger->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $accountLedger->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Ledger</button>
            <a href="{{ route('account_ledgers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

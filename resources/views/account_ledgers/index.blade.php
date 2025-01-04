@extends('layouts')

@section('content')
<div class="container">
    <h2>Account Ledgers</h2>
    <a href="{{ route('account_ledgers.create') }}" class="btn btn-primary mb-3">Add Ledger</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Ledger Name</th>
                <th>Chart of Account</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ledgers as $ledger)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ledger->ledger_name }}</td>
                <td>{{ $ledger->chartOfAccount->name }}</td>
                <td>{{ $ledger->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('account_ledgers.edit', $ledger) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('account_ledgers.destroy', $ledger) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

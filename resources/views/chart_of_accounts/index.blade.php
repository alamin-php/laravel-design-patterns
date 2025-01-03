@extends('layouts')

@section('title', 'Chart of Accounts')

@section('content')
    <div class="container">
        <h1>Chart of Accounts</h1>
        <a href="{{ route('chart_of_accounts.create') }}" class="btn btn-primary mb-3">Add New Account</a>

        <div id="chart-treeview" class="mt-4">
            <ul>
                @foreach ($accounts as $account)
                    <li id="account-{{ $account->id }}" data-jstree='{"opened": true, "icon": "bi bi-three-dots"}'>
                        <a class="font-weight-bold" href="{{ route('chart_of_accounts.edit', $account->id) }}">
                            {{ $account->name }}
                        </a>
                        @if ($account->children->count())
                            @include('chart_of_accounts.partials.child_tree', [
                                'children' => $account->children,
                            ])
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

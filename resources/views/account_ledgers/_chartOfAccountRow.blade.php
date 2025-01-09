<!-- resources/views/accountLedgers/_chartOfAccountRow.blade.php -->
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $chartOfAccount->name }}</td>
    <td>
        @if($chartOfAccount->children->isNotEmpty())
            <ul>
                @foreach($chartOfAccount->children as $child)
                    <li>{{ $child->name }}</li>
                @endforeach
            </ul>
        @else
            No Children
        @endif
    </td>
</tr>

@if($chartOfAccount->children->isNotEmpty())
    @foreach($chartOfAccount->children as $child)
        @include('account_ledgers._chartOfAccountRow', ['chartOfAccount' => $child])
    @endforeach
@endif

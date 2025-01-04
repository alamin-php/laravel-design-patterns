<ul>
    @foreach ($children as $child)
        <li id="account-{{ $child->id }}" data-jstree='{"icon": "bi bi-dash-lg"}'>
            <a href="{{ route('chart_of_accounts.edit', $child) }}">{{ $child->name }} </a>
            @if ($child->children->count())
                @include('chart_of_accounts.partials.child_tree', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>

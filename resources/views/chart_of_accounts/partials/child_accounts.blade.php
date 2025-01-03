<ul class="list-group mt-2 ms-4">
    @foreach ($children as $child)
        <li class="list-group-item">
            <div class="d-flex align-items-center">
                @if ($child->children->count())
                    <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="collapse" data-bs-target="#account-{{ $child->id }}" aria-expanded="false">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                @endif
                <a href="{{ route('chart_of_accounts.edit', $child) }}" class="text-decoration-none">
                    <strong>{{ $child->name }}</strong>
                </a> ({{ $child->type ?? 'No Type' }})
            </div>
            @if ($child->children->count())
                <div id="account-{{ $child->id }}" class="collapse">
                    @include('chart_of_accounts.partials.child_accounts', ['children' => $child->children])
                </div>
            @endif
        </li>
    @endforeach
</ul>

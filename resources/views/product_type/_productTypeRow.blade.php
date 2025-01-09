<li>
    {{ $type->name }}
    @if ($type->children->isNotEmpty())
        <ul>
            @foreach ($type->children as $child)
                @include('product_type._productTypeRow', ['type' => $child])
            @endforeach
        </ul>
    @endif
</li>

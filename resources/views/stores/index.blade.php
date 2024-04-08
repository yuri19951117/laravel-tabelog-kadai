@foreach ($stores as $store)
<a href="{{ route('stores.show', $store)}}">{{ $store->name }}</a>
    @endforeach
@extends('layouts.app')

@section('content')
<div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>お気に入り</h1>

       <hr>

        <div class="row">
            @foreach ($favorite_stores as $favorite_store)
                <div class="col-md-7 mt-2">
                    <div class="d-inline-flex">
                        <a href="{{ route('stores.show', $favorite_store->id) }}" class="w-25">
                            <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                        </a>
                        <div class="container mt-3">
                            <h5 >{{ $favorite_store->name }}</h5>
                            <h6 >&yen;{{ $favorite_store->lowest_price}}〜{{ $favorite_store->highest_price}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>
    </div>
</div>
@endsection
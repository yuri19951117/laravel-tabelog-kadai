@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

<h2>お気に入り</h2> 

<hr>
    @if($favorite_stores->count()==0)
    お気に入りに登録している店舗はありません。
    @else
    @foreach ($favorite_stores as $favorite_store)
        <div class="col-6 text-center">
            <a href="{{ route('stores.show', $favorite_store->id) }}" class="w-25">
                <img src="{{ asset($favorite_store->img)}}" class="img-fluid w-50">
            </a>
        </div>
                
        
        <div class="col-6">
            <h3>{{ $favorite_store->name }}</h3>
            <p>営業時間：{{ $favorite_store->opening_time }} 〜{{ $favorite_store->closing_time }}<p>
            <p>定休日：{{ $favorite_store->holiday}}<p>
            <p>住所：{{ $favorite_store->address }}<p>
            <p>予算：&yen;{{ $favorite_store->lowest_price}}〜{{ $favorite_store->highest_price}}</p>
            
        </div>
        <p></p>
        <hr>
            @endforeach
        
    @endif
        
        
</div>
</div>
@endsection

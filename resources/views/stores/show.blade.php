@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
<div class="col-md-6 mt-5">

<img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
</div>

<div class="col-md-6 mt-5">
    <h2>{{ $store->name }}</h2>
    <hr> 
    <p>{{ $store->description }}</p>
    <hr> 
    <p>営業時間：{{ $store->opening_time }} 〜{{ $store->closing_time }}<p>
    <p>定休日：{{ $store->holiday}}<p>
    <p>予算：&yen;{{ $store->lowest_price }} 〜{{ $store->highest_price }}<p>
    <p>住所：{{ $store->address }}<p>
    <hr> 
    <a class="btn btn-design" href="{{ route('reservations.create', ['store_id' => $store->id]) }}">予約する</a>
    <a class="btn btn-design"  href="{{ route('reviews.create', ['store_id' => $store->id]) }}">レビューを投稿する</a>   
    
    @if (session('message'))
        {{ session('message') }}
    @endif
    
    @if(Auth::user()->favorite_stores()->where('store_id', $store->id)->exists())
        <button type="button" class="btn btn-design" 
        href="{{ route('favorites.destroy', $store->id) }}" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">お気に入り解除</button>
    @else
        <button type="button" class="btn btn-design" 
        href="{{ route('favorites.store', $store->id) }}" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
        <i class="fa fa-heart"></i>お気に入り</button>
    @endif

</div>




    <!-- レビュー実装 -->
<div class="container">
<div class="row">
    <h2 class="my-3 ml-3 mt-5">レビュー一覧</h2>
    <table class="table table-striped">
    @foreach($reviews as $review)
        <tbody>
        <tr>
         <td>            
        <p class="h5">{{$review->content}}</p>
        <p class="h7">{{$review->created_at}}   {{$review->user->name}}</p>
        </td>
        </tr>
    @endforeach
</div>


    <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $store->id) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
    </form>
<form id="favorites-store-form" action="{{ route('favorites.store', $store->id) }}" method="POST" class="d-none">
@csrf
</form>
   

@endsection 
           

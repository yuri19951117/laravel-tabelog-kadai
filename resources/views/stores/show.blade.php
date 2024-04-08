{{ $store->name }}
<a href="{{ route('reservations.create', ['store_id' => $store->id]) }}">予約する</a>
@if (session('message'))
   {{ session('message') }}
    @endif

<br>
<a href="{{ route('reviews.create', ['store_id' => $store->id]) }}"><button type="submit" class="btn samuraimart-submit-button ml-2">レビューを投稿する</button></a>

<!-- レビュー実装 -->
 <h2>レビュー一覧</h2>
    <div class="row">
    @foreach($reviews as $review)
        <div class="offset-md-5 col-md-5">
        <p class="h3">{{$review->content}}</p>
        <label>{{$review->created_at}} {{$review->user->name}}</label>
        </div>
    @endforeach

@if(Auth::user()->favorite_stores()->where('store_id', $store->id)->exists())
    <a href="{{ route('favorites.destroy', $store->id) }}" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
    <i class="fa fa-heart"></i>
    お気に入り解除
    </a>
@else
    <a href="{{ route('favorites.store', $store->id) }}" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
    お気に入り
    </a>
 @endif
    <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $store->id) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
    </form>
@csrf
   


 
           

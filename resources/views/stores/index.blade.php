 @extends('layouts.app')
 
 @section('content')
 <div class="row">
 <div class="col-9">
 <div class="container">
             @if ($category !== null)
                 <a href="{{ route('stores.index') }}">トップ</a> > <a href="#"></a> > {{ $category->name }}
                 <h1>{{ $category->name }}の店舗一覧{{$total_count}}件</h1>
                 @elseif ($keyword !== null)
                <a href="{{ route('stores.index') }}">トップ</a> > 店舗一覧
                <h1>"{{ $keyword }}"の検索結果{{$total_count}}件</h1>
             @endif
</div>
<div class="container">
            <p><a class="btn btn-outline-secondary" @sortablelink('lowest_price', '最低価格順')</a>
            <a class="btn btn-outline-secondary" @sortablelink('highest_price', '最高価格順')</a></p>
</div>
<div class="container">
<div class="row">
<div class="col-md-2 mt-5">
         @component('components.sidebar', ['categories' => $categories])
         @endcomponent
</div>


<div class="col-md-10">
<div class="row w-60">
                 @foreach ($stores as $store)
                 
<div class="col-3">
                    <a class="nav-link fs-5 font-weight-bold" href="{{ route('stores.show', $store)}}">{{ $store->name }}</a>
                    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
<div class="row">
<div class="col-12 mb-3">
                    <p class="nagoyameshi-product-label mt-2"></p>
                    {{ $store->category->name }}
                             
</div>
</div>
                    &yen;{{ $store->lowest_price }} 〜
                     {{ $store->highest_price }}
</div>

                 @endforeach
</div>
</div>
                {{ $stores->appends(request()->query())->links() }}
</div>

</div>
@endsection



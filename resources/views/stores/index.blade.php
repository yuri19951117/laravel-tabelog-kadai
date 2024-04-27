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
        <div>
            @sortablelink('lowest_price', '価格が安い順')
            @sortablelink('highest_price', '価格が高い順')
        </div>
         <div class="container mt-4">
             <div class="row w-100">
                 @foreach ($stores as $store)
                 
                 <div class="col-3">
                     <a href="{{ route('stores.show', $store)}}">{{ $store->name }}</a>
                         <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="nagoyameshi-product-label mt-2">
                      
                             </p>
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
     <div class="col-2">
         @component('components.sidebar', ['categories' => $categories])
         @endcomponent
</div>
 </div>
 @endsection



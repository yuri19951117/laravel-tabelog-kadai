@extends('layouts.app')
 
@section('content')
<div class="row">
    <div class="col-12">
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
            <p><a class="btn btn-design" @sortablelink('lowest_price', '最低価格順')</a>
            <a class="btn btn-design" @sortablelink('highest_price', '最高価格順')</a></p>
        </div>

        
        <div class="container">
        <div class="row">
            <div class="col-md-2 mt-4 nagoyameshi-category-container rounded">
                @component('components.sidebar',['categories' => $categories])
                @endcomponent
            </div>

                    
            <div class="col-md-10 mt-4">
                        
                        <div class="container">
                        <div class="row">
                            @foreach ($stores as $store)
                                <div class="col-3 mb-3 mx-2 background rounded" style=height:200px;width:250px>
                                    <a href="{{ route('stores.show', $store)}}">
                                    <img src="{{ asset('img/dummy.png')}}" class="img-store mt-3 mb-1">    
                                    &nbsp;{{ $store->name }}</a>    
                                <div class="row">
                                <div class="col-12">
                                    &nbsp;&yen;{{ $store->lowest_price }} 〜 {{ $store->highest_price }}
                                </div>   
                                </div>
                                </div>  
                            @endforeach
                        </div>
                        </div>
                </div>
                    
            </div>           
        </div>

        <div class="block-center">
                {{ $stores->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection



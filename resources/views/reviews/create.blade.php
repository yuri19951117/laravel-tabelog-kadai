@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
<div class="col-md-6 mt-5">
    
<form action="{{ route('reviews.store') }}" method="POST">
@auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        <h2>レビュー内容</h2>
                         @error('content')
                             <strong>※レビュー内容を入力してください </strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="store_id" value="{{$store->id}}">
                         <button type="submit" class="btn btn-design">投稿</button>
                     </form>
                 </div>
             </div>
             @endauth
        </div>
    </div>
</div>


@endsection 
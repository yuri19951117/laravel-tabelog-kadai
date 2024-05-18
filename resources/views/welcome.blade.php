@extends('layouts.app')

    @section('content')

    <div class="welcome-background">
   

    <div class="container"style=height:800px>
    <div class="row">

            <div class="container">
            <div class="row">
            <div class="col-md-6 px-1 my-5 py-4 background text-center rounded mx-auto">

                <h2>名古屋のB級グルメを探す</h2>
                <form method="GET" action="{{ route('stores.index') }}">
                <select name="category">
                <option value='' >選択してください</option>
                    @foreach ($categories as $category)
                    <option value= "{{$category->id}}" > {{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-design">検索</button>
               </form>

            </div>
            </div>
            </div>
    
    </div>
    </div>
   

    </div>
                        
@endsection




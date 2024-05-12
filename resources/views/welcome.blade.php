@extends('layouts.app')

    @section('content')

    <div class="welcome-background">
   

    <div class="container"style=height:800px>
    <div class="row">

            <div class="container">
            <div class="row">
            <div class="col-md-12 px-1 my-5 py-4 background text-center rounded">

                <h2>名古屋のB級グルメを探す</h2>
                <form method="POST" action="{{ route('stores.index') }}">
                <select name="keyword"
                <option value='' </option>
                    @foreach ($categories as $category)
                    <option value= "$category->id" > {{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="keyword" value="{{$category->id}}">
                <button type="submit" class="btn btn-design">検索</button>
               </form>

            </div>
            </div>
            </div>
    
    </div>
    </div>
   

    </div>
                        
@endsection




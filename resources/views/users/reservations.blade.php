@extends('layouts.app')
 
@section('content')
<div class="container">
<div class="row">

<h2>予約一覧</h2> 
<hr>
@foreach ($reservations as $reservation)

        <div class="col-6 text-center">
            
                <a href="{{ route('stores.show', $reservation->store->id) }}" >
                    <img src="{{ asset($reservation->store->img)}}" class="w-50">
                </a>
        </div>

                
                <div class="col-6">
                    <h6>店舗名：{{ $reservation->store->name }}</h6>
                    <h6 >人数：{{ $reservation->reservation_people }}名</h6>
                    <h6 >日時：{{ $reservation->reservation_date }}</h6>
                    
                    <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
                    @csrf
                    @method('DELETE')  
                    <p></p>
                    <button class="btn btn-design" type="submit">キャンセルする</button>
                    </form>  
                    <p></p>
                        
                </div>
                <p></p>
                <hr>
      
@endforeach
        
        @if (session('message'))
   {{ session('message') }}
    @endif

    </div> 
    </div>
    
@endsection 
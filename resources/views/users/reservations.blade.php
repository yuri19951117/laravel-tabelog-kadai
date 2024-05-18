@extends('layouts.app')
 
@section('content')

    <div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
        <h2>予約一覧</h2>

       <hr>

        <div class="row">
        @foreach ($reservations as $reservation)
                <div class="col-md-7 mt-2">
                    <div class="d-inline-flex">
                    <a href="{{ route('stores.show', $reservation->store->id) }}" class="w-25">
                            <img src="{{ asset($reservation->store->img)}}" class="img-fluid w-100">
                        </a>
                        <div class="container mt-3">
                            <h6>店舗名：{{ $reservation->store->name }}</h6>
                            <h6 >人数：{{ $reservation->reservation_people }}名</h6>
                            <h6 >日時：{{ $reservation->reservation_date }}</h6>
                        </div>
                    </div>
                </div>
                <hr>

                <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
      @csrf
      @method('DELETE')  
      <button class="btn btn-design" type="submit">キャンセルする</button>
    </form>  
            @endforeach
        </div>
        @if (session('message'))
   {{ session('message') }}
    @endif


        @endsection 
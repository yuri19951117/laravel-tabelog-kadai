@foreach ($reservations as $reservation)
    {{ $reservation->store->name }}
    {{ $reservation->reservation_people }}
    {{ $reservation->reservation_date }}

    <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
      @csrf
      @method('DELETE')  
      <button type="submit">キャンセルする</button>
    </form>  
   
    @endforeach

@if (session('message'))
   {{ session('message') }}
    @endif
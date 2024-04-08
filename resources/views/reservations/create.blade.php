<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <input type="number" name="reservation_people" value="{{old('reservation_people')}}">
    <input type="date" name="date" value="{{old('date')}}">
    <select name="time">
    @for($i = date('G',strtotime($store->opening_time)); $i <= date('G',strtotime($store->closing_time)); $i++)
    @if(!is_null(old('time')) && old('time') == str_pad($i, 2, 0, STR_PAD_LEFT))
    <option value="{{str_pad($i, 2, 0, STR_PAD_LEFT)}}"
    selected>{{str_pad($i, 2, 0, STR_PAD_LEFT)}}:00</option>
    @else
    <option value="{{str_pad($i, 2, 0, STR_PAD_LEFT)}}">{{str_pad($i, 2, 0, STR_PAD_LEFT)}}:00</option>
    @endif
    @endfor
    </select>
    <input type="hidden" name="store_id" value="{{ $store->id }}">
    <button type="submit">予約</button>

  </form>
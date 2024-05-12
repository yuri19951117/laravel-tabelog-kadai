@extends('layouts.app')
 
@section('content')
<div class="container">
<div class="row">
<div class="col-md-4 mt-5 mx-auto">
    
    <h2>予約画面</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    人数
    <input type="number" name="reservation_people" value="{{old('reservation_people')}}">
    <hr>
    日付
    <input type="date" name="date" value="{{old('date')}}">
    <hr>
    時間
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
    <hr>
    <a class="btn btn-design" type="submit">予約</a>


    </form>

    @if (isset($errors))
    @foreach ($errors->all() as $error)
    {{ $error }}
    @endforeach
    @endif

</div>
</div>
</div>

@endsection



@extends('layouts.app') 

@section('content')

<form action="{{route('subscript.cancel')}}" method="POST">
    @csrf
    <button>有料会員を解約する</button>
</form>

@endsection


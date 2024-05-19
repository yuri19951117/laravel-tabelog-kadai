@extends('layouts.app') 

@section('content')

<h2 class="text-center">解約画面</h2>

<div class="container">
<div class="row">
<div class="col-6 text-center py-5 background mx-auto">


    <p>有料会員を解約する</p>
    <form action="{{route('subscript.cancel')}}" method="POST">
        @csrf
        <button>解約</button>
    </form>

</div>
</div>
</div>

@endsection


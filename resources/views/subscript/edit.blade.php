@extends('layouts.app') 

@section('content')

@if (session('message'))
    {{ session('message') }}
@endif

<div class="container">
<div class="row">
<div class="col-6 mt-5 mx-auto">

<h2 class="text-center">クレジットカード情報変更画面</h2>

<div class="container">
<div class="row">
<div class="col-6 py-4 background rounded mx-auto">

<b>変更前</b>
<p></p>
<p>名義人：{{$user->defaultPaymentMethod()->billing_details->name}}</p>
<p>カード番号：**** **** **** {{$user->defaultPaymentMethod()->card->last4}}</p>

</div>
</div>
<br>
<div class="row">
<div class="col-6 py-4 background rounded mx-auto">
<b>変更後</b>
<p></p>
<form id="card_form" action="{{ route('subscript.update') }}" method="POST">
    @csrf
    名義人：<input name="card-holder-name" id="card-holder-name" type="text">
    <p></p>
    カード番号：<input name="payment_method" class="ms-3" type="hidden">                                 
    <div id="card-element"></div> 
    <p></p>
    <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>
</form>

</div>
</div>
</div>

@error('card-holder-name')
<p>カード名義人を入力してください</p>
@enderror
        
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{env('STRIPE_KEY')}}");

    const elements = stripe.elements();
    const cardElement = elements.create('card',{hidePostalCode: true});

    cardElement.mount('#card-element');


    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            console.log(error);
        } else {
        const form = document.getElementById('card_form');
        form.payment_method.value = setupIntent.payment_method;
        form.submit();
        }
    });
</script>




</div>
</div>
</div>
@endsection





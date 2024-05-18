@extends('layouts.app') 

@section('content')

@if (session('message'))
    {{ session('message') }}
@endif

<div class="container">
<div class="row">
<div class="col-md-6 mt-5 text-center mx-auto">

<p>{{$user->defaultPaymentMethod()->billing_details->name}}</p>
<p>**** **** **** {{$user->defaultPaymentMethod()->card->last4}}</p>


<form id="card_form" action="{{ route('subscript.update') }}" method="POST">
    @csrf
    <input name="card-holder-name" id="card-holder-name" type="text">
    <div id="card-element"></div> 
    <input name="payment_method" class="ms-3" type="hidden">                                 
    <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>
</form>

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





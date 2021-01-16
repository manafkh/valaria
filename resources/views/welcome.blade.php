@extends('users.layouts.app')
@section('content')
<!-- Set up a container element for the button -->
<
<section id="breadcrumbs" class="breadcrumbs">
<div class="container text-center">
    <div id="paypal-button-container"></div>
</div>

</section>
<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=Acerq6AwNBN2aKmA-pZXgrmO8YuFVOvo_OQsEijhXAavoRjALlFHb5Cc0pyb-kOERskFCDwisyR4ABOe&currency=USD"></script>

<script>

    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{$model->price}}'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                axios.get('download/{{$model->id}}').then(

                );
                alert('Transaction completed by ' + details.payer.name.given_name + '!');

            });
        }


    }).render('#paypal-button-container');
</script>
@endsection
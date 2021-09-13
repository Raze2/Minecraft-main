@extends('layouts.frontend')

@section('content')
<section class="section_padding container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="section_tittle text-center">
                <h2>{{$product->name}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img class="rounded" src="{{ $product->photo->getUrl() }}">
        </div>
        <div class="col-md-8">
            <p class="h3 text-white" id="price">Price : ${{$product->price}}</p>
            <p>{{$product->description ?? ''}}</p>
            <div class="row align-items-center  mb-4">
                <div class="input-group col-md-4 mt-4">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                            <i class="fa fa-minus"></i>
                        </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                            <i class="fa fa-plus"></i>
                        </button>
                    </span>
                </div>
                <div class="col-md-8">
                    <p class="mt-1 mb-0">Have a Code?   <span id="coupon_status"></span></p>
                    <div class="have-code-container">
                        <input type="text" class="p-2 m-0" name="coupon_code" id="coupon_code" required>
                        <button type="submit" id="coupon_btn" class="btn btn_1 m-0 py-2 px-4 mb-1 rounded-0">Apply</button>
                    </div>
                </div>
            </div>
            <p class="h3 text-white subtotal">SubTotal : $<span id="subtotal_value">{{$product->price}}</span></p>
            <p class="h3 text-white discount">Dicount : -$<span id="discount_value">0</span></p>
            <p class="h3 text-white">Total : $<span id="total_value">{{$product->price}}</span></p>
            @if (\Auth::user()->player == 1 && isset(\Auth::user()->username))
            <div id="paypal-button-container" class="w-100 mt-3"></div>
            @else
            <p class="text-danger text-center mt-2">Login with your player account to buy</p>
            @endif
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.live.client_id')}}&currency=USD"></script>

    <script>
        $(document).ready(function(){  
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;    
        var coupon = $('#coupon_code').val() ?? null;
        var couponType = null;
        var couponValue = null;
        if(!couponValue){
            $('.discount, .subtotal').hide();
        }
        var quantity = parseInt($('#quantity').val());
        if(quantity>=1){
            $('#subtotal_value').html({{$product->price}} * (quantity))
        } else {
            $('#quantity').val(1)
        }
        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1); 
            $('#subtotal_value').html({{$product->price}} * (quantity + 1))
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity>1){
                $('#quantity').val(quantity - 1);
                $('#subtotal_value').html({{$product->price}} * (quantity - 1))
            }
        });

        $('#quantity').on('change mouseenter mouseleave', function(){
            var quantity = parseInt($('#quantity').val());
            if(quantity>=1){
                $('#subtotal_value').html({{$product->price}} * (quantity))
            } else {
                $('#quantity').val(1)
            }
        });

        $('body').on('DOMSubtreeModified','#subtotal_value', function(){
            var total = $('#subtotal_value').html();
            if(couponType == 'value'){
                $('#discount_value').html(couponValue);
                $('#total_value').html(total - couponValue);
            } else {
                $('#discount_value').html(couponValue * total / 100);
                $('#total_value').html(total - (couponValue * total / 100));
            }
        });
        
        $('#coupon_btn').on('click', function(){
            coupon = $('#coupon_code').val(); 
            if(coupon == ''){
                return
            }
            var coupon_btn_text = $('#coupon_btn').html();
            $('#coupon_btn').html('<i class="fas fa-spinner fa-spin"></i>');
            couponType = null;
            couponValue = null;
            $('.discount, .subtotal').hide();
            return fetch('/order/check-coupon', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": csrfToken
                },
                body:JSON.stringify({
                    'coupon': coupon,
                })
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                console.log(data.status);
                if(data.status == true){
                    $('#coupon_status').removeClass('text-danger');
                    $('#coupon_status').addClass('text-success');
                    $('#coupon_status').html(' Coupon Applied <i class="fa fa-check" aria-hidden="true"></i>');
                    couponType = data.type;
                    if(data.type == 'value'){
                        $('#discount_value').html(data.value);
                        couponValue = data.value;
                    } else {
                        var total = $('#subtotal_value').html();
                        $('#discount_value').html(data.percent_off * total / 100);
                        $('#total_value').html(total - (data.percent_off * total / 100));
                        couponValue = data.percent_off;
                    }
                    $('.discount, .subtotal').show();
                } else if (data.status == false) {
                    $('#coupon_status').removeClass('text-success');
                    $('#coupon_status').addClass('text-danger');
                    $('#coupon_status').html(' ' + data.msg + ' <i class="fa fa-times" aria-hidden="true"></i>');
                }
                $('#coupon_btn').html(coupon_btn_text);
                // return orderData.id;
            });
        });
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
        // Call your server to set up the transaction
             createOrder: function(data, actions) {
                return fetch('/paypal/order/create', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": csrfToken
                    },
                    body:JSON.stringify({
                        'product_id': '{{$product->id}}',
                        'user_id' : "{{auth()->user()->id}}",
                        'quantity': $('#quantity').val(),
                        'coupon': coupon,
                        'amount' : $('#total_value').html(),
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    //console.log(orderData);
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            
            onApprove: function(data, actions) {

                return fetch('/paypal/order/capture' , {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": csrfToken
                    },
                    body :JSON.stringify({
                        orderId : data.orderID,
                        payment_gateway_id: 1,
                        user_id: "{{ auth()->user()->id }}",
                    })
                }).then(function(res) {
                   // console.log(res.json());
                    return res.json();
                }).then(function(orderData) {

                    // Successful capture! For demo purposes:
                //    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                   // This function captures the funds from the transaction.
                    // alert('Transaction completed by ');
                    // var transaction = orderData.purchase_units[0].payments.captures[0];
                    // iziToast.success({
                    //     title: 'Success',
                    //     message: 'Payment completed',
                    //     position: 'topRight'
                    // });
                    window.location.href = "{{Route('frontend.orders')}}"
                });
            }

        }).render('#paypal-button-container');

    });
    </script>
@endsection

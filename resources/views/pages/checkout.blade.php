@extends('layouts/master')

@section('content')
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="{{ url('/pay') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                                <label>Full Name<span>*</span>
                                </label>
                                <input class="form-control" type="name" name="name">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Country<span>*</span></label>
                                <select class="form-control " name="country" id="country" readonly>
                                    <option selected value="Bangladesh">Bangladesh</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Product</th>
                                        <th class="text-uppercase">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $row)
                                    <tr>
                                        <td>{{$row->name}} x{{$row->qty}}</td>
                                        <td>{{$row->price }} BDT</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Card Subtitle</td>
                                        <td> {{ cart::Subtotal() }} BDT</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping charge</td>
                                        <td>100 BDT</td>
                                    </tr>
                                    @if(Session::has('coupon'))

                                    <tr>
                                        <td>Coupon</td>
                                        <td>- {{Session::get('coupon')['discount']}} BDT</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{Session::get('coupon')['balance'] + 100}} BDT</td>
                                        <input type="hidden" name="amount" value="{{Session::get('coupon')['balance'] + 100}}">
                                    </tr>
                                        @else
                                        <tr>
                                            <td>Total</td>
                                            <td>{{$total + 100}} BDT</td>
                                            <input type="hidden" name="amount" value="{{$total + 100}}">
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <div class=" paypal">
                                    <button class="ps-btn ps-btn--fullwidth" type="submit">Pay Now<i class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endsection

@extends('layouts/master')

@section('content')
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="{{url('payment')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                                <label>Full Name<span>*</span>
                                </label>
                                <input class="form-control" type="name" name="fullName">
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
                                    </tr>
                                        @else
                                        <tr>
                                            <td>Total</td>
                                            <td>{{$total + 100}} BDT</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class=" cheque">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" id="rdo01" name="payment" value="cod">
                                        <label for="rdo01">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class=" paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" value="paypal" id="paypal">
                                        <label for="paypal"><img src="{{asset('public/frontend/images/payment/1.png')}}" style="max-width: 50px; background-color: #fff;" alt=""></label>
                                    </div>
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="stripe" value="stripe">
                                        <label for="stripe"><img src="{{asset('public/frontend/images/payment/2.png')}}" style="max-width: 50px; background-color: #fff;" alt=""></label>
                                    </div>
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="ideal" value="ideal">
                                        <label for="ideal" ><img src="{{asset('public/frontend/images/payment/3.png')}}"  style="max-width: 50px; background-color: #fff;" alt=""></label>
                                    </div>
                                    <button class="ps-btn ps-btn--fullwidth" type="submit">Place Order<i class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

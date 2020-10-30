@extends('layouts/master')

@section('content')
    <div class="container pt-80 pb-80">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="ps-cart-listing">
                    <table class="table ps-cart__table">
                        <thead>
                            <tr>
                                <th>Payment Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Order Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $row)
                                <tr>
                                    <td>{{ $row->card_type }}</td>
                                    <td>{{ $row->amount }} BDT</td>
                                    <td>{{ $row->order_at }}</td>
                                    <td>{{ $row->transaction_id }}</td>
                                    <td>
                                        @if($row->status == "Processing")
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($row->status == 'accept')
                                            <span class="badge badge-info">Payment Accept</span>
                                        @elseif($row->status == 'deleveryprogress')
                                            <span class="badge badge-info">Progress </span>
                                        @elseif($row->status == 'done')
                                            <span class="badge badge-success">Delevered </span>
                                        @else
                                            <span class="badge badge-danger">Cancel </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="card" >
                    @if(Auth::user()->avatar)
                        <img src="{{ asset(Auth::user()->avatar) }}" class="card-img-top " style="height: 90px; width: 90px; margin-left: 34%;" >
                    @else
                        <img src="{{ asset('public/avatar.jpg') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                    @endif
                    <div class="card-body mt-30">
                        <h4 class="card-title">{{ Auth::user()->name }}</h4>
                        <ul class="list-group ">
                            <li class="mt-10"><a href="{{route('password.change')}}" class="btn btn-sm "> Password Change </a></li>
                            <li class="mt-10"><a href=""class="btn btn-sm "> Edit Profile </a></li>
                            <li class="mt-10"><a href="{{ route('success.orderlist') }}" class="btn btn-sm "> Return Order </a></li>
                        </ul>
                        <a class="btn btn-sm btn-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


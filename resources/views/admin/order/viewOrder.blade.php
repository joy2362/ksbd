@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Starlight</a>
            <span class="breadcrumb-item active">Order Section</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">

                <p class="mg-b-20 mg-sm-b-30">Order Details</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong> Details</div>

                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name: </th>
                                        <th>{{ $order->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone: </th>
                                        <th>{{ $order->phone }}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment: </th>
                                        <th>{{ $order->card_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment ID: </th>
                                        <th>{{ $order->transaction_id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Total :</th>
                                        <th>{{ $order->amount }} BDT</th>
                                    </tr>
                                    <tr>
                                        <th>Store Amount: </th>
                                        <th>{{ $order->store_amount }}</th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Shipping</strong> Details</div>

                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name: </th>
                                        <th>{{$order->shipment->ship_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone: </th>
                                        <th>{{$order->shipment->ship_phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <th>{{$order->shipment->ship_email}}</th>
                                    </tr>
                                    <tr>
                                        <th>Address: </th>
                                        <th>{{$order->shipment->ship_address}}</th>
                                    </tr>
                                    <tr>
                                        <th>Status : </th>
                                        <th>
                                            <span class="badge badge-info">  {{$order->status}}  </span>
                                        </th>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card pd-20 pd-sm-40 col-lg-12">
                        <h6 class="card-body-title">Product Details </h6>
                        <br>
                        <div class="table-wrapper">
                            <table  class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Product ID</th>
                                    <th class="wd-15p">Product Name</th>
                                    <th class="wd-15p">Image</th>
                                    <th class="wd-15p">Quantity</th>
                                    <th class="wd-15p">Unit Price</th>
                                    <th class="wd-20p">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $row)
                                    <tr>
                                        <td>{{ $row->product->product_code }}</td>
                                        <td>{{ $row->product->product_name }}</td>
                                        <td><img src="{{ URL::to($row->product->img_1) }}" height="50px;" width="50px;"></td>

                                        <td>
                                            {{ $row->quantity }}

                                        </td>
                                        <td>
                                            {{ $row->singleprice }} BDT

                                        </td>
                                        <td>
                                            {{ $row->totalprice }} BDT

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>


                @if($order->status == 'Processing')
                    <a href="{{ url('admin/order/accept/'.$order->id) }}" class="btn btn-info">Payment Accept</a>
                    <a href="{{ url('admin/order/cancel/'.$order->id) }}" class="btn btn-danger" id="delete">Cancel Order</a>
                @elseif($order->status == 'accept')
                    <a href="{{ url('admin/order/delevery/progress/'.$order->id) }}" class="btn btn-info">Delevery Progress</a>
                    <strong> Payment Already Checked and pass here for delevery request</strong>
                @elseif($order->status == 'deleveryprogress')
                    <a href="{{ url('admin/order/delevery/done/'.$order->id) }}" class="btn btn-success">Delevered Done</a>
                    <strong> Payment Already done your product are handover successfully</strong>
                @elseif($order->status == 'canceled')
                    <strong class="text-danger">This order are not valid its canceled</strong>
                @else
                    <strong class="text-success">This product are succesfully delevered</strong>
                @endif

            </div>
        </div>


@endsection

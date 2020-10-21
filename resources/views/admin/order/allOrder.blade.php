@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Order Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Card Type</th>
                            <th class="wd-15p">Store Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $row)
                            <tr>
                                <td>{{$row->transaction_id}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->card_type}}</td>
                                <td>{{$row->store_amount}}</td>
                                <td>
                                    @if($row->status == 'Processing')
                                        <a href="{{ url('admin/order/accept/'.$row->id) }}" class="btn btn-sm btn-info">Payment Accept</a>
                                        <a href="{{ url('admin/order/cancel/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Cancel Order</a>
                                    @elseif($row->status == 'accept')
                                        <a href="{{ url('admin/order/delevery/progress/'.$row->id) }}" class="btn btn-sm btn-info">Delevery Progress</a>
                                    @elseif($row->status == 'deleveryprogress')
                                        <a href="{{ url('admin/order/delevery/done/'.$row->id) }}" class="btn btn-sm btn-success">Delevered Done</a>

                                    @endif
                                        <a href="{{url("admin/order/view/".$row->id)}}" class=" btn btn-sm btn-success" >View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

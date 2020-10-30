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
                            <th class="wd-15p">Status</th>
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
                                    @if($row->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($row->return_order == 2)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row->return_order == 1)
                                        <a href="{{ url('admin/order/return/confirm/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Accept Return</a>
                                    @endif
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

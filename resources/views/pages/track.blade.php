@extends('layouts/master')

@section('content')
        <div class="container mt-20">
            <div class="row " >
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-sm-12 col-md-12"  style="border: 1px solid grey; padding: 20px;">
                    <div >
                        <div class="mt-20 text-center">Your Order Details</div>
                        <div class="jumbotron">
                            <ul>
                                <li>Order Id:  {{ $track->transaction_id }}</li>
                                <li>Payment Type:  {{ $track->card_type }}</li>
                                <li>Total: {{ $track->amount }} BDT</li>
                            </ul>
                        </div>
                        <div class="contact_form_title text-center">Your Order Status</div> <br>

                        <div class="progress">

                            @if($track->status == 'Processing' )
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><br>
                                {{-- 	  <small class="text-danger"><b>Your Order are under review <b></small> --}}
                            @elseif($track->status == 'accept')
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                                {{--   <small class="text-success"><b>Payment Accept Under Processing<b></small> --}}
                            @elseif($track->status == 'deleveryprogress')
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                {{--  <small class="text-success"><b>Packing Done Handover Progress<b></small> --}}
                            @elseif($track->status == 'done')
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>


                                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>


                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                                <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            @else
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><br>
                            @endif
                        </div>

                    </div>


                    @if($track->status == 'Processing')
                        <h4>Note: <b>Payment Accept Under Processing<b>    </h4>
                    @elseif($track->status == 'accept')
                        <h4>Note: <b>Payment Accept Under Processing<b>    </h4>
                    @elseif($track->status == 'deleveryprogress')
                        <h4>Note: <b>Packing Done Handover Progress<b>    </h4>
                    @elseif($track->status == 'done')
                        <h4>Note: <b>Successfully Delevered Your Order<b>    </h4>
                    @else
                        <h4>Note: <b>Order Cancel<b>    </h4>
                    @endif

                </div>

            </div>

        </div>
    </div>
@endsection

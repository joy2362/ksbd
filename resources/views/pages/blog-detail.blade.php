@extends('layouts/master')

@section('content')
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post--detail">
                        <div class="ps-post__thumbnail"><img src="{{asset($blog->post_img)}}" alt=""></div>
                        <div class="ps-post__header">
                            <h3 class="ps-post__title">{{$blog->post_title}}</h3>
                            <p class="ps-post__meta">Posted by {{$blog->user->name}} on {{date_format($blog->created_at,"M d,Y")}} </p>
                        </div>
                        <div class="ps-post__content">
                            {!!$blog->post_details!!}
                        </div>
                    </div>

                    <div class="ps-comments">
                        <h3>Comment</h3>
                        <div class="ps-comment">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="10" data-width=""></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">


                    <aside class="ps-widget--sidebar">
                        <div class="ps-widget__header">
                            <h3>Recent Posts</h3>
                        </div>
                        <div class="ps-widget__content">
                            @foreach($recentBlog as $row)
                            <div class="ps-post--sidebar">
                                <div class="ps-post__thumbnail"><a href="{{url('/blog-details/'.$row->id)}}"></a><img src="{{asset($row->post_img)}}" alt="" height="75" width="75"></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="{{url('/blog-details/'.$row->id)}}">{{$row->post_title}}</a><span>{{date_format($row->created_at,"M d,Y")}}</span></div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                    <aside class="ps-widget--sidebar">
                        <div class="ps-widget__header">
                            <h3>Ads Banner</h3>
                        </div>
                        <div class="ps-widget__content"></div>
                    </aside>
                    <aside class="ps-widget--sidebar">
                        <div class="ps-widget__header">
                            <h3>Best Seller</h3>
                        </div>
                        <div class="ps-widget__content">
                            <div class="ps-shoe--sidebar">
                                @foreach($topsale as $row)
                                <div class="ps-shoe__thumbnail"><a href="{{url('product-details/'.$row->id)}}"></a><img src="{{asset($row->img_1)}}" alt="" height="75" width="75"></div>
                                <div class="ps-shoe__content"><a class="ps-shoe__title" href="{{url('product-details/'.$row->id)}}">{{$row->product_name}}</a>
                                    <p> @if($row->discount_price)
                                            <del>{{$row->selling_price}} BDT</del>  {{$row->discount_price}} BDT
                                        @else
                                            {{$row->selling_price}} BDT
                                        @endif</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=2359594734340210&autoLogAppEvents=1" nonce="WXpQX3hM"></script>

@endsection

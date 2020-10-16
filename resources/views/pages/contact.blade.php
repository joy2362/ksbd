@extends('layouts/master')

@section('content')
    <div class="ps-contact ps-contact--2 ps-section pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header pt-50">
                        <h2 class="ps-section__title" data-mask="Contact">- Get in touch</h2>
                        <form class="ps-contact__form" action="do_action" method="post">
                            <div class="form-group">
                                <label>Name <sub>*</sub></label>
                                <input class="form-control" type="text" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email <sub>*</sub></label>
                                <input class="form-control" type="email" placeholder="">
                            </div>
                            <div class="form-group mb-25">
                                <label>Your Message <sub>*</sub></label>
                                <textarea class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn">Send Message<i class="ps-icon-next"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div id="contact-map" data-address="New York, NY" data-title="Sky Store!" data-zoom="17"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

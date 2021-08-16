@extends('layouts.frontend', ['breadcrumb'=>'Contact Us'])

@section('content')
<section class="section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="contact-title text-white mb-5">Get in Touch</h2>
        </div>
        <div class="row text-center">
            <div class="media contact-info col">
                <span class="contact-info__icon"><i class="fa fa-home text-white"></i></span>
                <div class="media-body">
                    <h3>UAE, UAE.</h3>
                    <p>ASD, ASD 1231123</p>
                </div>
            </div>
            <div class="media contact-info col">
                <span class="contact-info__icon"><i class="fa fa-tablet text-white"></i></span>
                <div class="media-body text-white">
                    <h3><a href="tel:0201550250519">00 201550250519</a></h3>
                    <p>Every day from 9am to 6pm</p>
                </div>
            </div>
            <div class="media contact-info col">
                <span class="contact-info__icon"><i class="fa fa-envelope text-white"></i></span>
                <div class="media-body text-white">
                    <h3><a href="mailto:asd@asd.com">asd@asd.com</h3>
                    <p>Send us your questions anytime!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

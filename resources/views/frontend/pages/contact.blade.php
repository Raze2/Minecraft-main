@extends('layouts.frontend')

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
        <div class="row">
            <div class="profilecard d-flex align-items-center justify-content-center flex-row">
                <div class="me pl-3 pr-5">
                    <div class="avatar">
                        <img src="{{asset('img/discord.png')}}" />
                    </div>
                    <div class="username">
                        <span class="text-white font-weight-normal">{{__('frontend.homepage.discordCommuinty')}}</span>
                    </div>
                </div>
                <div class="role">
                    <a href="https://discord.gg/MilanMC" target="_blank"
                        class="discord-button d-flex justify-content-center" target="_blank">
                        <div class="icon">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
                                <path class="st0"
                                    d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z" />
                                <path class="st0"
                                    d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z" />
                            </svg>
                        </div>
                        <span class="font-weight-normal">{{__('frontend.homepage.joinCommunity')}}</span>
                    </a>
                </div>
            </div>
            <div class="profilecard d-flex align-items-center justify-content-center flex-row team-speak">
                <div class="me pl-3 pr-5">
                    <div class="avatar">
                        <img src="{{asset('img/teamspeak_inverse.svg')}}" />
                    </div>
                    <div class="username">
                        <span
                            class="text-white font-weight-normal">{{__('frontend.homepage.teamSpeakCommuinty')}}</span>
                    </div>
                </div>
                <div class="role">
                    <a href="ts3server://Ts.MilanMC.com" target="_blank"
                        class="discord-button d-flex justify-content-center" target="_blank">
                        <div class="icon">
                            <img src="{{asset('img/teamspeak-icon.png')}}">
                        </div>
                        <span class="font-weight-normal">{{__('frontend.homepage.joinCommunity')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

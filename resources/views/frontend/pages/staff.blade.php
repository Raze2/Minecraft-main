@extends('layouts.frontend', ['breadcrumb'=>'Staff'])

@section('content')

    <section class="pricing_part padding_top">
        <div class="container">
            @foreach(App\Models\Staff::ROLE_SELECT as $role => $label)
                @php($owners = App\Models\Staff::where('role', $role)->with('media')->get())
                @if ($owners->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_tittle text-center  mt-5 mb-4">
                            <h2>{{Str::plural($label)}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($owners as $person)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_pricing_part">
                            @if($person->image)
                                <img class="h-100" src="{{ $person->image->getUrl() }}">
                            @else
                            <img class="h-100" src="{{ asset('img/skin.png')}}" alt="">
                            @endif
                            <h3 class="text-white">{{ $person->username }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            @endforeach
        </div>
    </section>
    
@endsection
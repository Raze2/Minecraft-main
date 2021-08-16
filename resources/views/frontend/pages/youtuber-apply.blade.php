@extends('layouts.frontend', ['breadcrumb'=>'Youtube Apply'])

@section('content')
    <section class="section_padding">
        <div class="container">
            @php ($page = App\Models\ContentPage::find(3))
            @isset($page)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_tittle text-center">
                            <h2 class="text-white">{!! $page->title !!}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! $page->page_text !!}
                </div>
            @endisset
        </div>
    </section>
@endsection
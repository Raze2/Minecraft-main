@extends('layouts.frontend')

@section('content')
    <section class="section_padding">
        <div class="container">
            @php ($page = App\Models\ContentPage::find(4))
            @isset($page)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_tittle text-center">
                            <h2 class="text-white">{!! app()->getLocale() == 'en' ? $page->title : $page->title_ar ?? $page->title !!}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! app()->getLocale() == 'en' ? $page->page_text : $page->page_text_ar ?? $page->page_text !!}
                </div>
            @endisset
        </div>
    </section>
@endsection
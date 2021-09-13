@extends('layouts.frontend', ['breadcrumb' => trans('global.new_ticket')])

@section('content')
<div class="content container padding_top">
    <div class="row">
        <p class="col-lg-12">
            <a class="text-white" href="{{ route('frontend.tickets.showOpen') }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i></a> | 
                <span class="font-weight-bold">{{trans('global.new_ticket')}}</span>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route("frontend.tickets.storeTicket") }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">

                            {{-- <div class="col-lg-12 form-group">
                            <label for="recipient" class="control-label">
                                {{ trans('global.recipient') }}
                            </label>
                            <select name="recipient" class="form-control">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-lg-12 form-group">
                            <label for="subject" class="control-label">
                                {{ trans('global.subject') }}
                            </label>
                            <input type="text" name="subject" class="form-control" />
                        </div>

                        <div class="col-lg-12 form-group">
                            <label for="content" class="control-label">
                                {{ trans('global.content') }}
                            </label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="{{ trans('global.submit') }}" class="btn_1 float-right"/>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection

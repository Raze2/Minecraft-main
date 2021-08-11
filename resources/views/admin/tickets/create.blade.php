@extends('admin.tickets.template')

@section('title', trans('global.new_message'))

@section('tickets-content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route("admin.tickets.storeTicket") }}" method="POST">
            @csrf
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 form-group">
                            <label for="creator" class="control-label">
                                {{ trans('global.user') }}
                            </label>
                            <select class="form-control select2 {{ $errors->has('creator') ? 'is-invalid' : '' }}" name="creator" id="creator">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id, old('creator', [])) ? 'selected' : '' }}>{{ $user->name }} - {{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

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
                    <input type="submit" value="{{ trans('global.submit') }}" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</div>
@stop
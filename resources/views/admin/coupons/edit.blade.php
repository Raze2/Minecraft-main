@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.coupon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.coupons.update", [$coupon->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.coupon.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $coupon->code) }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.coupon.fields.type') }}</label>coupon
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Coupon::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $coupon->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.coupon.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', $coupon->value) }}" step="1">
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percent_off">{{ trans('cruds.coupon.fields.percent_off') }}</label>
                <input class="form-control {{ $errors->has('percent_off') ? 'is-invalid' : '' }}" type="number" name="percent_off" id="percent_off" value="{{ old('percent_off', $coupon->percent_off) }}" step="1">
                @if($errors->has('percent_off'))
                    <span class="text-danger">{{ $errors->first('percent_off') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.percent_off_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uses_allowed">{{ trans('cruds.coupon.fields.uses_allowed') }}</label>
                <input class="form-control {{ $errors->has('uses_allowed') ? 'is-invalid' : '' }}" type="number" name="uses_allowed" id="uses_allowed" value="{{ old('uses_allowed', $coupon->uses_allowed) }}" step="1">
                @if($errors->has('uses_allowed'))
                    <span class="text-danger">{{ $errors->first('uses_allowed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.uses_allowed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="used_times">{{ trans('cruds.coupon.fields.used_times') }}</label>
                <input class="form-control {{ $errors->has('used_times') ? 'is-invalid' : '' }}" type="number" name="used_times" id="used_times" value="{{ old('used_times', $coupon->used_times) }}" step="1">
                @if($errors->has('used_times'))
                    <span class="text-danger">{{ $errors->first('used_times') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.used_times_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.coupon.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $coupon->start_date) }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.coupon.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $coupon->end_date) }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coupon.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
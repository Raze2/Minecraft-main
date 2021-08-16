@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.game.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.games.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.id') }}
                        </th>
                        <td>
                            {{ $game->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.name') }}
                        </th>
                        <td>
                            {{ $game->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.role') }}
                        </th>
                        <td>
                            {{ App\Models\Game::ROLE_SELECT[$game->role] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.image') }}
                        </th>
                        <td>
                            @if($game->image)
                                <a href="{{ $game->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $game->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.url') }}
                        </th>
                        <td>
                            {{ $game->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.games.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
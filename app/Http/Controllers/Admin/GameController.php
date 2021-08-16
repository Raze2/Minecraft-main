<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGameRequest;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games = Game::with(['media'])->get();

        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        abort_if(Gate::denies('game_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.games.create');
    }

    public function store(StoreGameRequest $request)
    {
        $games = Game::create($request->all());

        if ($request->input('image', false)) {
            $games->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $games->id]);
        }

        return redirect()->route('admin.games.index');
    }

    public function edit(Game $games)
    {
        abort_if(Gate::denies('game_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.games.edit', compact('games'));
    }

    public function update(UpdateGameRequest $request, Game $games)
    {
        $games->update($request->all());

        if ($request->input('image', false)) {
            if (!$games->image || $request->input('image') !== $games->image->file_name) {
                if ($games->image) {
                    $games->image->delete();
                }
                $games->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($games->image) {
            $games->image->delete();
        }

        return redirect()->route('admin.games.index');
    }

    public function show(Game $games)
    {
        abort_if(Gate::denies('game_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.games.show', compact('games'));
    }

    public function destroy(Game $games)
    {
        abort_if(Gate::denies('game_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games->delete();

        return back();
    }

    public function massDestroy(MassDestroyGameRequest $request)
    {
        Game::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('game_create') && Gate::denies('game_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Game();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\SeasonRequest;

class SeasonController extends Controller
{
   
    public function index(): View
    {
        $seasons = Season::all();

        return view('admin.seasons.index', compact('seasons'));
    }

    public function create(): View
    {
        return view('admin.seasons.create');
    }

    public function store(SeasonRequest $request): RedirectResponse
    {
        Season::create($request->validated());

        return redirect()->route('admin.seasons.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Season $season): View
    {
        return view('admin.seasons.show', compact('season'));
    }

    public function edit(Season $season): View
    {
        return view('admin.seasons.edit', compact('season'));
    }

    public function update(SeasonRequest $request, Season $season): RedirectResponse
    {
        $season->update($request->validated());

        return redirect()->route('admin.seasons.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Season $season): RedirectResponse
    {
        $season->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Season::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}

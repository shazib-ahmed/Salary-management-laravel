<?php

namespace App\Http\Controllers\Admin;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\SalaryRequest;
use App\Models\Player;
use App\Models\Season;
use App\Models\Team;

class SalaryController extends Controller
{
   
    public function index(): View
    {
        $salaries = Salary::all();

        return view('admin.salaries.index', compact('salaries'));
    }

    public function create(): View
    {
        $teams = Team::all()->pluck('name', 'id');
        $seasons = Season::all()->pluck('season', 'id');
        $players = Player::all()->pluck('name', 'id');

        return view('admin.salaries.create', compact('teams','seasons', 'players'));
    }

    public function store(SalaryRequest $request): RedirectResponse
    {
        Salary::create($request->validated());

        return redirect()->route('admin.salaries.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Salary $salary): View
    {
        return view('admin.salaries.show', compact('salary'));
    }

    public function edit(Salary $salary): View
    {
        $teams = Team::all()->pluck('name', 'id');
        $seasons = Season::all()->pluck('season', 'id');
        $players = Player::all()->pluck('name', 'id');

        return view('admin.salaries.edit', compact('salary','teams', 'seasons','players'));
    }

    public function update(SalaryRequest $request, Salary $salary): RedirectResponse
    {
        $salary->update($request->validated());

        return redirect()->route('admin.salaries.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Salary $salary): RedirectResponse
    {
        $salary->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Salary::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Salary;

class PlayerController extends Controller
{
   
    public function index(): View
    {
        $players = Player::all();

        return view('admin.players.index', compact('players'));
    }

    public function create(): View
    {
        $countries = Country::all()->pluck('name', 'id');

        return view('admin.players.create', compact('countries'));
    }

    public function store(PlayerRequest $request): RedirectResponse
    {
        Player::create($request->validated());

        return redirect()->route('admin.players.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Player $player): View
    {
        $salaries = Salary::where('player_id', $player->id)->get();
        
        return view('admin.players.show', compact('player', 'salaries'));
    }

    public function edit(Player $player): View
    {
        $countries = Country::all()->pluck('name', 'id');

        return view('admin.players.edit', compact('player','countries'));
    }

    public function update(PlayerRequest $request, Player $player): RedirectResponse
    {
        $player->update($request->validated());

        return redirect()->route('admin.players.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Player $player): RedirectResponse
    {
        $player->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Player::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}

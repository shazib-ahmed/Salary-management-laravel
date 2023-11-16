<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CountryRequest;

class CountryController extends Controller
{
   
    public function index(): View
    {
        $countries = Country::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create(): View
    {
        return view('admin.countries.create');
    }

    public function store(CountryRequest $request): RedirectResponse
    {
        Country::create($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Country $country): View
    {
        return view('admin.countries.show', compact('country'));
    }

    public function edit(Country $country): View
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Country::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}

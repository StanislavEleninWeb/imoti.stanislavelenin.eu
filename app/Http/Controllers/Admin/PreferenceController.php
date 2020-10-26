<?php

namespace App\Http\Controllers\Admin;

use App\Preference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Preference\StorePreferenceTable;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('preference.admin.index', [
            'preferences' => Preference::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preference.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreferenceTable $request)
    {
        $preference = Preference::create($request->validated());

        return redirect()->route('admin.preference.show', $preference->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function show(Preference $preference)
    {
        return view('preference.admin.show', compact('preference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function edit(Preference $preference)
    {
        return view('preference.admin.edit', compact('preference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function update(StorePreferenceTable $request, Preference $preference)
    {
        $preference->update($request->validated());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preference $preference)
    {
        $preference->delete();

        return redirect()->route('admin.preference.index');
    }
}

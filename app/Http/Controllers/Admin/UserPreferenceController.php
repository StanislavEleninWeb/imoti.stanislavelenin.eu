<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserPreference;
use App\Preference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserPreference\StoreUserPreferenceTable;

class UserPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userPreference.admin.index', [
            //'preferences' => UserPreference::where('user_id', '=', \Auth::id())->get()
            'preferences' => User::find(1)->preferences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userPreference.admin.create', [
            'preferences' => Preference::where('active', '=', '1')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPreferenceTable $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = \Auth::id();

        $userPreference = UserPreference::create($validated);

        return redirect()->route('admin.user.preference.show', $userPreference->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function show($userPreference)
    {
        $userPreference = UserPreference::find($userPreference);
        return view('userPreference.admin.show', [
            'userPreference' => $userPreference,
            'user' => User::find($userPreference->user_id),
            'preference' => Preference::find($userPreference->preference_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function edit($userPreference)
    {
        $userPreference = UserPreference::find($userPreference);
        return view('userPreference.admin.edit', [
            'userPreference' => $userPreference,
            'preferences' => Preference::where('active', '=', '1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPreference $userPreference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPreference $userPreference)
    {
        //
    }
}

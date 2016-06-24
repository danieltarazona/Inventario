<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\Store;
use App\Program;
use App\State;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cities = City::lists('name', 'id');
        $stores = Store::lists('name', 'id');
        $programs = Program::lists('name', 'id');
        $states = State::lists('name', 'id');

        return view('users.edit', compact('user', 'cities', 'programs', 'stores', 'states'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input('city'));

        $user = User::FindOrFail($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->first_lastname = $request->input('first_lastname');
        $user->last_lastname = $request->input('last_lastname');
        $user->email = $request->input('email');
        $user->adress = $request->input('adress');
        $user->telephone = $request->input('telephone');
        $user->cellphone = $request->input('cellphone');
        $user->city_id = $request->input('city_id');
        $user->program_id = $request->input('program_id');
        $user->store_id = $request->input('store_id');
        $user->state_id = $request->input('state_id');
        $user->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('users');

        // return redirect()->route('users.index');
    }
}

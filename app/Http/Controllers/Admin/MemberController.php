<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::orderBy('id', 'desc')->get();

        return view('admin.member.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
    {
        $countries = Country::all();

        return view('admin.member.edit', [
            'members' => $members,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Members $members)
    {
        $members->firstName = $request->firstName;
        $members->lastName = $request->lastName;
        $members->birthdate = $request->birthdate;
        $members->reportSubject = $request->reportSubject;
        $members->countryId = $request->countryId;
        $members->phone = $request->phone;
        $members->email = $request->email;

        $this->validate($request, [
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'birthdate' => 'required|date|before:now',
            'reportSubject' => 'required|max:100',
            'countryId' => 'required',
            'email' => 'required|unique:members|regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
            'phone' => 'required'
        ]);

        $members->save();

        return redirect()->back()->withSuccess('Member was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members)
    {
        $members->delete();
        return redirect()->back()->withSuccess('Member was deleted successfully');
    }
}

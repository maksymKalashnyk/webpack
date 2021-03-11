<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profiles;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profiles::orderBy('id', 'desc')->get();

        return view('admin.profile.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Profiles $profiles)
    {
        return view('admin.profile.edit', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profiles $profiles)
    {
        $profiles->company = $request->company;
        $profiles->position = $request->position;
        $profiles->aboutMe = $request->aboutMe;
        $profiles->hide = $request->hide;

        $photo = $request->file('photo');
        if ($photo != null) {
            $profiles->photo = $photo->store('photo', 'public');
        } else {
            $profiles->photo = $profiles->photo;
        }

        $this->validate($request, [
            'company' => 'max:100',
            'position' => 'max:100',
            'aboutMe' => 'max:500',
            'photo' => 'mimes:png,jpg|image'
        ]);

        $profiles->save();

        return redirect()->back()->withSuccess('Profile was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiles $profiles)
    {
        $profiles->delete();
        return redirect()->back()->withSuccess('Profile was deleted successfully');
    }
}

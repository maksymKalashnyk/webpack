<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Profiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Symfony\Component\HttpKernel\Profiler\Profile;

class MemberProfileController extends Controller
{
    public function firstForm(Request $request, Members $member)
    {
        $member->firstName = $request->firstName;
        $member->lastName = $request->lastName;
        $member->birthdate = $request->birthdate;
        $member->reportSubject = $request->reportSubject;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->countryId = $request->countryId;

        $this->validate($request, [
            'email' => 'unique:members'
        ]);

        $member->save();

        // $cookie = Cookie::make('id', $member['id'], 30, null, null, false, false);

        return response()->json($member)->setStatusCode(201);
    }

    public function secondForm(Request $request, Profiles $profile)
    {
        $profile->company = $request->company;
        $profile->position = $request->position;
        $profile->aboutMe = $request->aboutMe;
        $profile->userId = $request->userId;

        $photo = $request->file('photo');
        if ($photo != null) {
            $profile->photo = $photo->store('photo', 'public');
        } else {
            $profile->photo = null;
        }

        $profile->save();

        return response()->json($profile)->setStatusCode(201)->withCookie(Cookie::forget('id'));
    }

    public function getAllProfiles()
    {
        $allProfiles = Profiles::orderBy('id', 'desc')->where('hide', '0')->get();
        $profileArray = [];

        foreach ($allProfiles as $key => $profile) {
            $profileArray[$key] = $profile;
            $profileArray[$key]['user'] = $profile->user;
        }

        return response()->json($profileArray)->setStatusCode(200);
    }

    public function countProfiles()
    {
        $profiles = Profiles::all()->where('hide', '0')->count();
        
        return response()->json([
            'count' => $profiles,
            'share' => [
                'text' => 'Check out thisMeetup with SoCal AngularJS!',
                'link' => url('/')
            ]])->setStatusCode(200);
    }
}

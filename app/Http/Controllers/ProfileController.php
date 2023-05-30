<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{
    public function store(Request $request)
    {

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $profile = new Profile();
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->save();
        return response()->json($profile);
    }

}

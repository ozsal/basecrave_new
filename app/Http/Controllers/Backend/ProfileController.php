<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileRepo;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->middleware('auth');
        $this->profileRepo = $profileRepo;

    }

    public function index()
    {
        $profiles = Profile::all();
        return view('backend.profile.index', compact('profiles'));

    }

    public function create()
    {
        return view('backend.profile.create');
    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('favicon')){
            $myTime = date('Ymd_His');
            $image = $request->file('favicon');
            $getImageName = $myTime.'.'.$request->file('favicon')->getClientOriginalExtension();

            $image->move(public_path('images/profile'), $getImageName);
            $requestData['favicon'] = $getImageName;
        }
        $profile = $this->profileRepo->create($requestData);
        return redirect(route('profile'))->with('message', "Profile created successfully");

    }


    public function edit($id)
    {
        $profile = $this->profileRepo->get_by_id($id);
        $profiles= Profile::all();

        return view('backend.profile.edit', compact('profile', 'profiles'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('favicon')){
            $myTime = date('Ymd_His');
            $image = $request->file('favicon');
            $getImageName = $myTime.'.'.$request->file('favicon')->getClientOriginalExtension();

            $image->move(public_path('images/profile'), $getImageName);
            $requestData['favicon'] = $getImageName;
        }
        $profile = $this->profileRepo->update($requestData, $id);
        return redirect(route('profile'))->with('message', "Profile updated successfully");
    }

    public function destroy($id)
    {
        $destroyProfile = Profile::findorfail($id);
        if($destroyProfile){
            $destroyProfile->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $settingsRepo;

    public function __construct(SettingsRepository $settingsRepo)
    {
        $this->middleware('auth');
        $this->settingsRepo = $settingsRepo;

    }

    public function index()
    {
        $settings = Settings::all();
        return view('backend.settings.index', compact('settings'));

    }

    public function create()
    {
        return view('backend.settings.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('logo')){
            $myTime = date('Ymd_His');
            $logo = $request->file('logo');
            $getLogoName = $myTime.'.'.$request->file('logo')->getClientOriginalExtension();

            $logo->move(public_path('images/logo'), $getLogoName);
            $requestData['logo'] = $getLogoName;
        }
        $settings = $this->settingsRepo->create($requestData);
        return redirect(route('settings'))->with('message', "Settings created successfully");

    }


    public function edit($id)
    {
        $settings = $this->settingsRepo->get_by_id($id);

        return view('backend.settings.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('logo')){
            $myTime = date('Ymd_His');
            $logo = $request->file('logo');
            $getLogoName = $myTime.'.'.$request->file('logo')->getClientOriginalExtension();
            $logo->move(public_path('images/logo'), $getLogoName);
            $requestData['logo'] = $getLogoName;
        }
        $settings = $this->settingsRepo->update($requestData, $id);

        return redirect(route('settings', $id))->with('alert-success', 'Settings Updated successfully');
    }

    public function destroy($id)
    {
        $destroySettings = Settings::findorfail($id);
        if($destroySettings){
            $destroySettings->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

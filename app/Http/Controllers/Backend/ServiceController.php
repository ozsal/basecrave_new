<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceRepo;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->middleware('auth');
        $this->serviceRepo = $serviceRepo;

    }

    public function index()
    {
        $services = Service::all();
        return view('backend.services.index', compact('services'));

    }

    public function create()
    {
        return view('backend.services.create');
    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $services = $this->serviceRepo->create($requestData);
        return redirect(route('services'))->with('message', "Service created successfully");

    }


    public function edit($id)
    {
        $service = $this->serviceRepo->get_by_id($id);
        $services= Service::all();

        return view('backend.services.edit', compact('service', 'services'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $services = $this->serviceRepo->update($requestData, $id);
        return redirect(route('services'))->with('message', "Service updated successfully");
    }

    public function destroy($id)
    {
        $destroyService = Service::findorfail($id);
        if($destroyService){
            $destroyService->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NotifyModel;
use App\Models\Service;
use App\Repositories\NotifyModelRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class NotifyModelController extends Controller
{
    private $notifyModelRepo;

    public function __construct(NotifyModelRepository $notifyModelRepo)
    {
        $this->middleware('auth');
        $this->notifyModelRepo = $notifyModelRepo;

    }

    public function index()
    {
        $notifyModels = NotifyModel::all();
        return view('backend.notifyModel.index', compact('notifyModels'));

    }

    public function create()
    {
        return view('backend.notifyModel.create');
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
        $notifyModel = $this->notifyModelRepo->create($requestData);
        return redirect(route('notifyModels'))->with('message', "Notify Model created successfully");

    }


    public function edit($id)
    {
        $notifyModel = $this->notifyModelRepo->get_by_id($id);
        $notifyModels= NotifyModel::all();

        return view('backend.notifyModel.edit', compact('notifyModel', 'notifyModels'));
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
        $notifyModel = $this->notifyModelRepo->update($requestData, $id);
        return redirect(route('notifyModels'))->with('message', "NotifyModel updated successfully");
    }

    public function destroy($id)
    {
        $destroyNotifyModel = NotifyModel::findorfail($id);
        if($destroyNotifyModel){
            $destroyNotifyModel->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

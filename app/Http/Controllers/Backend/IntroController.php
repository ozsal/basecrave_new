<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Repositories\IntroRepository;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    private $introRepo;

    public function __construct(IntroRepository $introRepo)
    {
        $this->middleware('auth');
        $this->introRepo = $introRepo;

    }

    public function index()
    {
        $intros = Intro::all();
        return view('backend.intro.index', compact('intros'));

    }

    public function create()
    {
        return view('backend.intro.create');

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
        $intros = $this->introRepo->create($requestData);
        return redirect(route('intro'))->with('message', "Introduction created successfully");
    }


    public function edit($id)
    {
        $intro = $this->introRepo->get_by_id($id);
        $intros = Intro::all();

        return view('backend.intro.edit', compact('intro', 'intros'));
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
        $intro = $this->introRepo->update($requestData, $id);

        return redirect(route('intro'))->with('alert-success', 'Introduction Updated successfully');
    }

    public function destroy($id)
    {
        $destroyIntro = Intro::findorfail($id);
        if($destroyIntro){
            $destroyIntro->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

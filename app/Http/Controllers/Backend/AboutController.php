<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Repositories\AboutRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutRepo;

    public function __construct(AboutRepository $aboutRepo)
    {
        $this->middleware('auth');
        $this->aboutRepo = $aboutRepo;

    }

    public function index()
    {
        $abouts = About::all();
        return view('backend.about.index', compact('abouts'));

    }

    public function create()
    {
        return view('backend.about.create');

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
        $abouts = $this->aboutRepo->create($requestData);
        return redirect(route('about'))->with('message', "About created successfully");

    }


    public function edit($id)
    {
        $about = $this->aboutRepo->get_by_id($id);
        $aboutUs= About::all();

        return view('backend.about.edit', compact('about', 'aboutUs'));
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
        $about = $this->aboutRepo->update($requestData, $id);

        return redirect(route('about', $id))->with('alert-success', 'About Updated successfully');
    }

    public function destroy($id)
    {
        $destroyabout = About::findorfail($id);
        if($destroyabout){
            $destroyabout->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

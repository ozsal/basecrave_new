<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $teamRepo;

    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->middleware('auth');
        $this->galleryRepo = $galleryRepo;

    }

    public function index()
    {
        $gallerys = Gallery::all();
        return view('backend.gallery.index', compact('gallerys'));

    }

    public function create()
    {
        return view('backend.gallery.create');

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
        $gallery = $this->galleryRepo->create($requestData);
        return redirect(route('gallery'))->with('message', "Gallery created successfully");

    }


    public function edit($id)
    {
        $gallery = $this->galleryRepo->get_by_id($id);

        return view('backend.gallery.edit', compact('gallery'));
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
        $teams = $this->galleryRepo->update($requestData, $id);
        return redirect(route('gallery'))->with('message', "Gallery updated successfully");
    }

    public function destroy($id)
    {
        $destroyGallery = Gallery::findorfail($id);
        if($destroyGallery){
            $destroyGallery->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

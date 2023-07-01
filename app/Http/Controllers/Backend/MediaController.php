<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    private $mediaRepo;

    public function __construct(MediaRepository $mediaRepo)
    {
        $this->middleware('auth');
        $this->mediaRepo = $mediaRepo;

    }

    public function index()
    {
        $medias = Media::all();
        return view('backend.media.index', compact('medias'));

    }

    public function create()
    {
        return view('backend.media.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/media'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $medias = $this->mediaRepo->create($requestData);
        return redirect(route('media'))->with('message', "Media created successfully");
    }


    public function edit($id)
    {
        $media = $this->mediaRepo->get_by_id($id);

        return view('backend.media.edit', compact('media'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/media'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $media = $this->mediaRepo->update($requestData, $id);

        return redirect(route('media'))->with('alert-success', 'Media Updated successfully');
    }

    public function destroy($id)
    {
        $destroyMedia = Media::findorfail($id);
        if($destroyMedia){
            $destroyMedia->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

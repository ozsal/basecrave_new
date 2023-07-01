<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $bannerRepo;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->middleware('auth');
        $this->bannerRepo = $bannerRepo;

    }

    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index', compact('banners'));

    }

    public function create()
    {
        return view('backend.banner.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $myTime = date('Ymd_His');
            $logo = $request->file('image');
            $getLogoName = $myTime . '.' . $request->file('image')->getClientOriginalExtension();
            $logo->move(public_path('images/banner'), $getLogoName);
            $requestData['image'] = $getLogoName;
        }

        $banner = $this->bannerRepo->create($requestData);
        return redirect(route('banner'))->with('message', "Banner created successfully");

    }


    public function edit($id)
    {
        $banner = $this->bannerRepo->get_by_id($id);
        $banners = Banner::all();

        return view('backend.banner.edit', compact('banner', 'banners'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $myTime = date('Ymd_His');
            $logo = $request->file('image');
            $getLogoName = $myTime . '.' . $request->file('image')->getClientOriginalExtension();
            $logo->move(public_path('images/banner'), $getLogoName);
            $requestData['image'] = $getLogoName;
        }
        $banner = $this->bannerRepo->update($requestData, $id);

        return redirect(route('banner', $id))->with('alert-success', 'Banner Updated successfully');
    }

    public function destroy($id)
    {
        $destroyBanner = Banner::findorfail($id);
        if($destroyBanner){
            $destroyBanner->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategories;
use App\Models\Categories;
use App\Repositories\SubCategoriesRepository;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    private $subcategoriesRepo;

    public function __construct(SubCategoriesRepository $subcategoriesRepo)
    {
        $this->middleware('auth');
        $this->subcategoriesRepo = $subcategoriesRepo;

    }

    public function index()
    {
        $subcategories = SubCategories::all();
        return view('backend.subcategories.index', compact('subcategories'));

    }

    public function create()
    {
        $categories = Categories::all();
        return view('backend.subcategories.create', compact('categories'));

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/subcategories'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $subcategories = $this->subcategoriesRepo->create($requestData);
        return redirect(route('subcategories'))->with('message', "Sub Categories created successfully");

    }


    public function edit($id)
    {
        $subcategories = $this->subcategoriesRepo->get_by_id($id);
        $categories = Categories::all();

        return view('backend.subcategories.edit', compact('subcategories','categories'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/subcategories'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $subcategories = $this->subcategoriesRepo->update($requestData, $id);

        return redirect(route('subcategories', $id))->with('alert-success', 'Sub Categories Updated successfully');
    }

    public function destroy($id)
    {
        $destroysubcategories = SubCategories::findorfail($id);
        if($destroysubcategories){
            $destroysubcategories->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

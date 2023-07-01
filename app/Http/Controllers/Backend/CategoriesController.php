<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoriesRepo;

    public function __construct(CategoriesRepository $categoriesRepo)
    {
        $this->middleware('auth');
        $this->categoriesRepo = $categoriesRepo;

    }

    public function index()
    {
        $categories = Categories::all();
        return view('backend.categories.index', compact('categories'));

    }

    public function create()
    {
        return view('backend.categories.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        $categories = $this->categoriesRepo->create($requestData);
        return redirect(route('categories'))->with('message', "Categories created successfully");

    }


    public function edit($id)
    {
        $categories = $this->categoriesRepo->get_by_id($id);

        return view('backend.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $categories = $this->categoriesRepo->update($requestData, $id);

        return redirect(route('categories', $id))->with('alert-success', 'Categories Updated successfully');
    }

    public function destroy($id)
    {
        $destroycategories = Categories::findorfail($id);
        if($destroycategories){
            $destroycategories->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

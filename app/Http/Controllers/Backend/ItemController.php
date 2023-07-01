<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SubCategories;
use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemsRepo;

    public function __construct(ItemsRepository $itemsRepo)
    {
        $this->middleware('auth');
        $this->itemsRepo = $itemsRepo;

    }

    public function index()
    {
        $items = Item::all();
        return view('backend.items.index', compact('items'));

    }

    public function create()
    {
        $subcategories = SubCategories::all(); 
        return view('backend.items.create', compact('subcategories'));

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/items'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $items = $this->itemsRepo->create($requestData);
        return redirect(route('items'))->with('message', "Items created successfully");

    }


    public function edit($id)
    {
        $items = $this->itemsRepo->get_by_id($id);
        $subcategories = SubCategories::all();

        return view('backend.items.edit', compact('items', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $myTime = date('Ymd_His');
            $image = $request->file('image');
            $getImageName = $myTime.'.'.$request->file('image')->getClientOriginalExtension();

            $image->move(public_path('images/items'), $getImageName);
            $requestData['image'] = $getImageName;
        }
        $items = $this->itemsRepo->update($requestData, $id);

        return redirect(route('items', $id))->with('alert-success', 'Items Updated successfully');
    }

    public function destroy($id)
    {
        $destroyItems = Item::findorfail($id);
        if($destroyItems){
            $destroyItems->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }

    public function changeStatus(Request $request,$id)
    {
        $statusItems = Item::findorfail($id);
        $requestData = $request->all();
        if($statusItems){
            $items = $this->itemsRepo->updateStatus($requestData, $id);
            $type = 'success';
            return response()->json(array('items'=> $items, 'type' => $type));
        }else{
            return false;
        }
    }
}

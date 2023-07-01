<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OpeningHour;
use App\Repositories\OpeningHourRepository;
use Illuminate\Http\Request;

class OpeningHourController extends Controller
{
    private $openinghourRepo;

    public function __construct(OpeningHourRepository $openinghourRepo)
    {
        $this->middleware('auth');
        $this->openinghourRepo = $openinghourRepo;

    }

    public function index()
    {
        $openinghours = OpeningHour::all();
        return view('backend.openinghour.index', compact('openinghours'));

    }

    public function create()
    {
        return view('backend.openinghour.create');

    }


    public function store(Request $request)
    {

        $requestData = $request->all();
        $openinghours = $this->openinghourRepo->create($requestData);
        return redirect(route('openinghour'))->with('message', "Opening hour created successfully");

    }


    public function edit($id)
    {
        $openinghour = $this->openinghourRepo->get_by_id($id);

        return view('backend.openinghour.edit', compact('openinghour'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $openinghour = $this->openinghourRepo->update($requestData, $id);

        return redirect(route('openinghour', $id))->with('alert-success', 'Opening hour Updated successfully');
    }

    public function destroy($id)
    {
        $destroyOpeninghour = OpeningHour::findorfail($id);
        if($destroyOpeninghour){
            $destroyOpeninghour->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

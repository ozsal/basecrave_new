<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->middleware('auth');
        $this->contactRepo = $contactRepo;

    }

    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));

    }

    public function create()
    {
        return view('backend.contact.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        $contacts = $this->contactRepo->create($requestData);
        return redirect(route('contact'))->with('message', "Contact created successfully");

    }


    public function edit($id)
    {
        $contact = $this->contactRepo->get_by_id($id);
        $contacts= Contact::all();

        return view('backend.contact.edit', compact('contact', 'contacts'));
    }

    public function update(Request $request, $id)
    {
        $contact = $this->contactRepo->update($request->all(), $id);

        return redirect(route('contact'))->with('alert-success', 'Contact Updated successfully');
    }

    public function destroy($id)
    {
        $destroyContact = About::findorfail($id);
        if($destroyContact){
            $destroyContact->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

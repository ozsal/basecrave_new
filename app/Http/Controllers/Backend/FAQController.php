<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Repositories\FAQRepository;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    private $faqRepo;

    public function __construct(FAQRepository $faqRepo)
    {
        $this->middleware('auth');
        $this->faqRepo = $faqRepo;

    }

    public function index()
    {
        $faqs = FAQ::all();
        return view('backend.faq.index', compact('faqs'));

    }

    public function create()
    {
        return view('backend.faq.create');
    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        $faq = $this->faqRepo->create($requestData);
        return redirect(route('faqs'))->with('message', "FAQ created successfully");

    }


    public function edit($id)
    {
        $faq = $this->faqRepo->get_by_id($id);
        $faqs= FAQ::all();

        return view('backend.faq.edit', compact('faq', 'faqs'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $faqs = $this->faqRepo->update($requestData, $id);
        return redirect(route('faqs'))->with('message', "FAQ updated successfully");
    }

    public function destroy($id)
    {
        $destroyFAQ = FAQ::findorfail($id);
        if($destroyFAQ){
            $destroyFAQ->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

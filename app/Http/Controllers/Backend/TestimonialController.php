<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class TestimonialController extends Controller
{
    private $testimonialRepo;

    public function __construct(TestimonialRepository $testimonialRepo)
    {
        $this->middleware('auth');
        $this->testimonialRepo = $testimonialRepo;

    }

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.index', compact('testimonials'));

    }

    public function create()
    {
        return view('backend.testimonial.create');

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
        $testimonials = $this->testimonialRepo->create($requestData);
        return redirect(route('testimonial'))->with('message', "Testimonial created successfully");

    }


    public function edit($id)
    {
        $testimonial = $this->testimonialRepo->get_by_id($id);
        $testimonials = Testimonial::all();

        return view('backend.testimonial.edit', compact('testimonial', 'testimonials'));
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
        $testimonials = $this->testimonialRepo->update($requestData, $id);
        return redirect(route('testimonial'))->with('message', "Testimonial updated successfully");
    }

    public function destroy($id)
    {
        $destroyTestimonial = Testimonial::findorfail($id);
        if($destroyTestimonial){
            $destroyTestimonial->delete();
            return response()->json('true');
        }else{
            return false;
        }
    }
}

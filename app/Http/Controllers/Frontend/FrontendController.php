<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\OpeningHour;
use App\Models\About;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Item;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\Profile;

class FrontendController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $abouts = About::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        $testimonials = Testimonial::all();
        $banners = Banner::all();
        $gallery = Gallery::all();
        $profile = Profile::all();
        $specialItems = Item::where('is_special', 'yes')->get();
        return view('frontend.index', compact('settings','openinghours', 'abouts','categories','subcategories','testimonials', 'banners','specialItems','gallery','profile'));
    }

    public function menu()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        $profile = Profile::all();
        return view('frontend.menu',compact('settings','openinghours','categories','subcategories','profile'));
    }
    public function about()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $abouts = About::all();
        $profile = Profile::all();
        return view('frontend.about',compact('settings','openinghours','abouts','profile'));
    }
    public function booktable()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $profile = Profile::all();
        return view('frontend.booktable',compact('settings','openinghours','profile'));
    }
    public function detail($id)
    {
        $items = Item::where('subcategory_id', $id)->get();
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        $profile = Profile::all();

        return view('frontend.detail',compact('settings','openinghours','categories','subcategories','items','profile'));
    }

    public function gallery()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $gallerys = Gallery::all();
        $profile = Profile::all();

        return view('frontend.gallery',compact('settings','openinghours','gallerys','profile'));
    }
    
    public function media()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $medias = Media::all();
        $profile = Profile::all();

        return view('frontend.media',compact('settings','openinghours','medias','profile'));
    }
}

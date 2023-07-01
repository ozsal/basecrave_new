<?php

namespace App\Repositories;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

Class TestimonialRepositoryEloquent implements TestimonialRepository
{
    public function create($attributes)
    {
        $testimonial = new Testimonial();
        $testimonial->customer_name = $attributes['name'];
        $testimonial->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $testimonial->image = $attributes['image'];
        } else {
            $testimonial->image = 0;
        }
        $testimonial->save();
        return $testimonial;
    }

    public function get_by_id($id)
    {
        return Testimonial::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editTestimonial= $this->get_by_id($id);
        $oldImage = $editTestimonial->image;

        $editTestimonial->customer_name = $attributes['name'];
        $editTestimonial->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $editTestimonial->image = $attributes['image'];
        } else {
            $editTestimonial->image = $oldImage;
        }
        $editTestimonial->save();
        return $editTestimonial;

    }
}

<?php

namespace App\Repositories;

use App\Models\About;
use Illuminate\Support\Facades\Auth;

Class AboutRepositoryEloquent implements AboutRepository
{
    public function create($attributes)
    {
        $about = new About();
        $about->title = $attributes['title'];
        $about->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $about->image = $attributes['image'];
        } else {
            $about->image = 0;
        }
        $about->save();
        return $about;
    }

    public function get_by_id($id)
    {
        return About::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editAbout = $this->get_by_id($id);
        $oldImage = $editAbout->image;

        $editAbout->title = $attributes['title'];
        $editAbout->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $editAbout->image = $attributes['image'];
        } else {
            $editAbout->image = $oldImage;
        }
        $editAbout->save();
        return $editAbout;

    }
}

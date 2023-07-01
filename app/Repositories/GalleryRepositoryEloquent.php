<?php

namespace App\Repositories;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

Class GalleryRepositoryEloquent implements GalleryRepository
{
    public function create($attributes)
    {
        $gallery = new Gallery();
        $gallery->title = $attributes['title'];
        $gallery->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $gallery->image = $attributes['image'];
        } else {
            $gallery->image = 0;
        }
        $gallery->save();
        return $gallery;
    }

    public function get_by_id($id)
    {
        return Gallery::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editgallery= $this->get_by_id($id);
        $oldImage = $editgallery->image;

        $editgallery->title = $attributes['title'];
        $editgallery->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $editgallery->image = $attributes['image'];
        } else {
            $editgallery->image = $oldImage;
        }
        $editgallery->save();
        return $editgallery;

    }
}

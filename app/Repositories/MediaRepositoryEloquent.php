<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;

Class MediaRepositoryEloquent implements MediaRepository
{
    public function create($attributes)
    {
        $media = new Media();
        $media->title = $attributes['title'];
        $media->short_description = $attributes['description'];
        $media->media_link = $attributes['media_link'];
        if(array_key_exists('image',$attributes)){
            $media->image = $attributes['image'];
        } else {
            $media->image = 0;
        }
        $media->save();
        return $media;
    }

    public function get_by_id($id)
    {
        return Media::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editMedia= $this->get_by_id($id);

        $oldImage = $editMedia->image;

        $editMedia->title = $attributes['title'];
        $editMedia->short_description = $attributes['description'];
        $editMedia->media_link = $attributes['media_link'];
        if(array_key_exists('image',$attributes)){
            $editMedia->image = $attributes['image'];
        } else {
            $editMedia->image = $oldImage;
        }
        $editMedia->save();
        return $editMedia;

    }
}

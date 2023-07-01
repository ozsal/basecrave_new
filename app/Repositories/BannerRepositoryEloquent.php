<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

Class BannerRepositoryEloquent implements BannerRepository
{
    public function create($attributes)
    {
        $banner = new Banner();
        if(array_key_exists('image',$attributes)){
            $banner->image = $attributes['image'];
        } else {
            $banner->image = 0;
        }
        $banner->title = $attributes['title'];
        $banner->description = $attributes['description'];
        $banner->save();
        return $banner;
    }

    public function get_by_id($id)
    {
        return Banner::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editBanner = $this->get_by_id($id);
        $oldImage = $editBanner->image;

        if(array_key_exists('image',$attributes)){
            $editBanner->image = $attributes['image'];
        } else {
            $editBanner->image = $oldImage;
        }
        $editBanner->title = $attributes['title'];
        $editBanner->description = $attributes['description'];
        $editBanner->save();
        return $editBanner;

    }
}

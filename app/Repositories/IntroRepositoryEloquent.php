<?php

namespace App\Repositories;

use App\Models\Intro;
use Illuminate\Support\Facades\Auth;

Class IntroRepositoryEloquent implements IntroRepository
{
    public function create($attributes)
    {
        $intro = new Intro();
        $intro->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $intro->image = $attributes['image'];
        } else {
            $intro->image = 0;
        }
        $intro->status = 1;
        $intro->save();
        return $intro;
    }

    public function get_by_id($id)
    {
        return Intro::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editIntro= $this->get_by_id($id);

        $oldImage = $editIntro->image;

        $editIntro->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $editIntro->image = $attributes['image'];
        } else {
            $editIntro->image = $oldImage;
        }
        $editIntro->status = 1;
        $editIntro->save();
        return $editIntro;

    }
}

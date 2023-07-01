<?php

namespace App\Repositories;

use App\Models\About;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

Class ProfileRepositoryEloquent implements ProfileRepository
{
    public function create($attributes)
    {
        $profile = new Profile();
        if(array_key_exists('favicon',$attributes)){
            $profile->favicon = $attributes['favicon'];
        } else {
            $profile->favicon = 0;
        }
        $profile->save();
        return $profile;
    }

    public function get_by_id($id)
    {
        return Profile::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editProfile= $this->get_by_id($id);
        $oldImage = $editProfile->favicon;

        if(array_key_exists('favicon',$attributes)){
            $editProfile->favicon = $attributes['favicon'];
        } else {
            $editProfile->favicon = $oldImage;
        }
        $editProfile->save();
        return $editProfile;

    }
}

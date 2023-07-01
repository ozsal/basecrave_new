<?php

namespace App\Repositories;

use App\Models\CallMe;
use Illuminate\Support\Facades\Auth;

Class CallMeRepositoryEloquent implements CallMeRepository
{
    public function create($attributes)
    {
        $callMe = new CallMe();
        $callMe->name = $attributes['name'];
        $callMe->email = $attributes['email'];
        $callMe->phone = $attributes['number'];
        $callMe->category = $attributes['category'];
        $callMe->save();
        return $callMe;
    }

    public function get_by_id($id)
    {
        return CallMe::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editCallme = $this->get_by_id($id);

        $editCallme->name = $attributes['name'];
        $editCallme->email = $attributes['email'];
        $editCallme->phone = $attributes['number'];
        $editCallme->category = $attributes['category'];
        $editCallme->save();
        return $editCallme;
        return $editCallme;

    }
}

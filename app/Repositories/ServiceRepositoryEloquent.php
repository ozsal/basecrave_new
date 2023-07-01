<?php

namespace App\Repositories;

use App\Models\About;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

Class ServiceRepositoryEloquent implements ServiceRepository
{
    public function create($attributes)
    {
        $service = new Service();
        $service->service_name = $attributes['service'];
        $service->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $service->image = $attributes['image'];
        } else {
            $service->image = 0;
        }
        $service->save();
        return $service;
    }

    public function get_by_id($id)
    {
        return Service::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editService= $this->get_by_id($id);
        $oldImage = $editService->image;

        $editService->service_name = $attributes['service'];
        $editService->description = $attributes['description'];
        if(array_key_exists('image',$attributes)){
            $editService->image = $attributes['image'];
        } else {
            $editService->image = $oldImage;
        }
        $editService->save();
        return $editService;

    }
}

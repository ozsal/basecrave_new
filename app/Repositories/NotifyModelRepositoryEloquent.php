<?php

namespace App\Repositories;

use App\Models\About;
use App\Models\NotifyModel;
use Illuminate\Support\Facades\Auth;

Class NotifyModelRepositoryEloquent implements NotifyModelRepository
{
    public function create($attributes)
    {
        $notifyModel = new NotifyModel();
        $notifyModel->title = $attributes['title'];
        $notifyModel->remarks = $attributes['remarks'];
        if(array_key_exists('image',$attributes)){
            $notifyModel->image = $attributes['image'];
        } else {
            $notifyModel->image = 0;
        }
        $notifyModel->status = $attributes['status'];
        $notifyModel->save();
        return $notifyModel;
    }

    public function get_by_id($id)
    {
        return NotifyModel::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editNotifyModel= $this->get_by_id($id);
        $oldImage = $editNotifyModel->image;

        $editNotifyModel->title = $attributes['title'];
        $editNotifyModel->remarks = $attributes['remarks'];
        if(array_key_exists('image',$attributes)){
            $editNotifyModel->image = $attributes['image'];
        } else {
            $editNotifyModel->image = $oldImage;
        }
        $editNotifyModel->status = $attributes['status'];
        $editNotifyModel->save();
        return $editNotifyModel;

    }
}

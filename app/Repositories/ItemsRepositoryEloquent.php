<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

Class ItemsRepositoryEloquent implements ItemsRepository
{
    public function create($attributes)
    {
        $items = new Item();
        $items->title = $attributes['title'];
        $items->subcategory_id = $attributes['subcategories_id'];
        $items->description = $attributes['description'];
        $items->price = $attributes['price']; 
        if(array_key_exists('image',$attributes)){
            $items->image = $attributes['image'];
        } else {
            $items->image = 0;
        }
        $items->save();
        return $items;
    }

    public function get_by_id($id)
    {
        return Item::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editItems= $this->get_by_id($id);
        $oldImage = $editItems->image;

        $editItems->title = $attributes['title'];
        $editItems->subcategory_id = $attributes['subcategories_id'];
        $editItems->description = $attributes['description'];
        $editItems->price = $attributes['price'];
        if(array_key_exists('image',$attributes)){
            $editItems->image = $attributes['image'];
        } else {
            $editItems->image = $oldImage;
        }
        $editItems->save();
        return $editItems;

    }


    public function updateStatus($attributes, $id)
    {
        $updateitems= $this->get_by_id($id);  
        $updateitems->is_special = $attributes['statusvalue'];
        $updateitems->save();
        return $updateitems;

    }


}

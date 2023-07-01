<?php

namespace App\Repositories;

use App\Models\SubCategories;
use Illuminate\Support\Facades\Auth;

Class SubCategoriesRepositoryEloquent implements SubCategoriesRepository
{
    public function create($attributes)
    {
        $subcategories = new SubCategories();
        $subcategories->subcategories_name = $attributes['subcategories_name'];
        $subcategories->categories_id = $attributes['categories_id'];
        $subcategories->short_description = $attributes['short_description'];
        if(array_key_exists('image',$attributes)){
            $subcategories->subcategories_image = $attributes['image'];
        } else {
            $subcategories->subcategories_image = 0;
        }
        $subcategories->save();
        return $subcategories;
    }

    public function get_by_id($id)
    {
        return SubCategories::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editsubcategories = $this->get_by_id($id);

        $editsubcategories->subcategories_name = $attributes['subcategories_name'];
        $editsubcategories->categories_id = $attributes['categories_id'];
        $editsubcategories->short_description = $attributes['short_description'];
        $oldImage = $editsubcategories->subcategories_image;

        if(array_key_exists('image',$attributes)){
            $editsubcategories->subcategories_image = $attributes['image'];
        } else {
            $editsubcategories->subcategories_image = $oldImage;
        }
        $editsubcategories->save();
        return $editsubcategories;

    }
}

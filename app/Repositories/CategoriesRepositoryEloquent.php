<?php

namespace App\Repositories;

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

Class CategoriesRepositoryEloquent implements CategoriesRepository
{
    public function create($attributes)
    {
        $categories = new Categories();
        $categories->categories_name = $attributes['categories_name'];        
        $categories->save();
        return $categories;
    }

    public function get_by_id($id)
    {
        return Categories::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editcategories = $this->get_by_id($id);

        $editcategories->categories_name = $attributes['categories_name']; 
        $editcategories->save();
        return $editcategories;

    }
}

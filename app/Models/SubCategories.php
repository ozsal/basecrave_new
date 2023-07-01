<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $table = "sub_categories_menu";

    protected $guarded = [];


    public function subcategories(){
        return $this->belongsTo('App\Models\Categories', 'categories_id');
    }

    
    public function subcat(){
        return $this->hasMany('App\Models\Item', 'subcategory_id', 'id');
    }
}

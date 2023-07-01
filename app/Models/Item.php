<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items__menu";

    protected $guarded = [];


    public function items(){
        return $this->hasOne('App\Models\SubCategories', 'id', 'subcategory_id');
    }
}

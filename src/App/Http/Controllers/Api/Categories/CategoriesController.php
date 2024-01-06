<?php

namespace Silah\LaraRoles\App\Http\Controllers\Api\Categories;

use  Silah\LaraEaseRoles\App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response([
            'status'=>'success',
            'categories'=>$categories
        ],200);
    }
}

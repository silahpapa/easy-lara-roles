<?php

namespace Silah\LaraRoles\App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use Silah\LaraRoles\Models\Category;

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

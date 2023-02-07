<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAddCategory(Request $request){
        return view('admin.category.add');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        return view('admin.admin',compact('users','products','categories'));
    }
}

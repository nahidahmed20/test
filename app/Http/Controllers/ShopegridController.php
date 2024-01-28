<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopegridController extends Controller
{
    public function index()
    {
        return view('website.home.index',['products' => Product::orderBY('id', 'desc')->take(8)->get()]);
    }
    public function category($id)
    {
        return view('website.category.index',[
            'products' => Product::where('category_id', $id)->orderBy('id', 'desc')->get(),
        ]);
    }
    public function product($id)
    {
        return view('website.product.index',[
            'product' => Product::find($id)
        ]);
    }
    public function subCategory($id)
    {
        return view('website.category.index',[
            'products' => Product::where('sub_category_id', $id)->orderBy('id', 'desc')->get(),
        ]);
    }
}

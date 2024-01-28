<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product, $products;

    public function index()
    {
        return view('admin.product.index',['products' => Product::all()]);
    }
    public function create()
    {
        return view('admin.product.add',[
                'categories'        => Category::all(),
                'sub_categories'    => SubCategory::all(),
                'brands'            => Brand::all(),
                'units'             => Unit::all(),
            ]);
    }

    private $categoryId, $subCategories;
    public function getSubCategoryByCategory()
    {
        $this->categoryId = $_GET['id'];
        $this->subCategories = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);

    }

    public function store(Request $request)
    {
        $this->product = Product::newProduct($request);
        ProductImage::newProductImage($request->other_image, $this->product->id);
        return back()->with('message', 'Product info Update Successfully.....');
    }
    public function detail($id)
    {
        return view('admin.product.detail',['product' => Product::find($id)]);
    }
    public function edit($id)
    {
        return view('admin.product.edit',[
            'product'           => Product::find($id),
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }
    public function update(Request $request, $id)
    {
        Product::updatedProduct($request, $id);
        if ($request->file('other_image'))
        {
            ProductImage::updateOtherProductImage($request->file('other_image'),$id);
        }
        return redirect('/product/manage')->with('message','Product info Update Successfully..');
    }
    public function delete($id)
    {
        Product::deleteProduct($id);
        ProductImage::deleteProductOtherImage($id);
        return redirect('/product/manage')->with('message','Product info delete Successfully..');
    }
}

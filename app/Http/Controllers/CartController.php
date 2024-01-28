<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart.index',['cart_products' => Cart::content()]);
    }
    public function addToCart(Request $request,$id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'qty'       => $request->qty,
            'price'     => $this->product->selling_price,
            'options'    => [
                'image'     => $this->product->image,
                'category'  => $this->product->category->name,
                'brand'     => $this->product->brand->name,
            ]
        ]);

        return redirect('cart/show');
    }
    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return redirect('cart/show');
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart/show');
    }
}

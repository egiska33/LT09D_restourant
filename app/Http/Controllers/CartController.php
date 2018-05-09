<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $products = Session::has('cart') ? Session::get('cart')->products : null ;
        return view('cart.index', compact('products'));
    }
    public function ajaxAdd(Request $request)
    {
        $id = $request->input('id');
        $dish =Dish::findOrFail($id);
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }else {
            $oldCart = null;
        }
//        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($dish, $id);
        $request->session()->put('cart', $cart);
        echo json_encode($cart);
    }
    public function deleteByOne(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteByOne($id);
        $request->session()->put('cart', $cart);
        $products = $cart->products;
        return redirect()->route('cart.index', compact('products'));
    }
    public function deleteByItem(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteByItem($id);
        $request->session()->put('cart', $cart);
        $products = $cart->products;
        return redirect()->route('cart.index', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Stripe\Stripe;
use Stripe\Charge;
use App\cart;
use App\Order;
use Session;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index',['products' => $products]);
    }

    public function getAddToCart(REQUEST $request, $id)
    {
    	$product = Product::find($id);
    	$oldcart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new cart($oldcart);
    	$cart->add($product,$product->id);

    	$request->session()->put('cart', $cart);
    	#dd($request->session()->get('cart'));
    	return redirect()->route('product.index');
    	#return view('shop.index',['products' => $products]);
    }

    public function getReduceByOne($id)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldcart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingcart');
    }

    public function getRemoveItem($id)
    {
         $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldcart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else {
            Session::forget('cart');
        }

        
        return redirect()->route('product.shoppingcart');
    }

    public function getCart()
    {
        if(!Session::has('cart'))
        {
            return view('shop.shoppingcart');
        }
        $oldcart = Session::get('cart');
        $cart = new cart($oldcart);
        return view('shop.shoppingcart', ['products' => $cart->items, 'totalprice' => $cart->totalprice]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart'))
        {
            return view('shop.shoppingcart');
        }
        $oldcart = Session::get('cart');
        $cart = new cart($oldcart);
        $total = $cart->totalprice;
        return view('shop.checkout', ['total'=> $total]);
    }

    public function postCheckout(REQUEST $request)
    {
        if(!Session::has('cart'))
        {
            return redirect()->route('shop.shoppingcart');
        }
        $oldcart = Session::get('cart');
        $cart = new cart($oldcart);

        \Stripe\Stripe::setApiKey('sk_test_oHxEfliecfTloBUqfXcrX4Ip'); 
        try{
                  $charge = \Stripe\Charge::create(array(
                  "amount" => $cart->totalprice * 100,
                  "currency" => "usd",
                  "source" => $request->input('stripeToken'),
                  "description" => "Charge")
            );
                  $order = new Order();
                  $order->cart = serialize($cart);
                  $order->address = $request->input('address');
                  $order->name = $request->input('name');
                  $order->payment_id = $charge->id;

                  Auth::user()->orders()->save($order);
        }
        catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('product.index')->with('success','Successfully Purchased!! Keep Shopping!!');
    }
}

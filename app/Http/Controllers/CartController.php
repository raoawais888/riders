<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\CheckoutMail;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart');
        return view("cart.cart");
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "productID" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        $data = [];
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            $data = [
                'price' => $cart[$request->id]['price'] * $cart[$request->id]["quantity"],
                'data' => 1
            ];
        } else {
            $data += ['data' => 0];
        }
        $ucart = session()->get('cart');
        $total = 0;
        $count = count($ucart);
        foreach ($ucart as $cart) {
            $total += $cart['quantity'] * $cart['price'];
        }
        $data += ['total' => $total, 'count' => $count];
        return $data;
    }
    public function remove(Request $request)
    {
        $data = [];
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        $ucart = session()->get('cart');
        $sub_total = 0;
        $total = count($ucart);
        foreach ($ucart as $cart) {
            $sub_total += $cart['quantity'] * $cart['price'];
        }
        $data += ['total' => $total, 'subTotal' => $sub_total];
        return $data;
    }
    public function checkout()
    {
        $cart = session()->get('cart');
        if ($cart != null) {
            $count = count($cart);
            return view("cart.checkout", compact('count'));
        }
        return redirect()->route('cart');
    }
    public function doCheckout(Request $request)
    {
        $data = [];
        $email = ['waqasarif588@gmail.com'];
        $sub_total = 0;
        $user = Auth::user();
        $cart = session()->get('cart');
        $orderId = rand(10000, 1000000);
        foreach($cart as $car){
            $sub_total += $car['quantity'] * $car['price'];
        }
        //Generating Order
        $order = new Order();
        $order->id = $orderId;
        $order->firstname = $request->fname;
        $order->lastname = $request->lname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->country = $request->country;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->phone = $request->phone;
        $order->user_id = $user->id;
        $order->total = $sub_total;
        $order_create =  $order->save();
        $data += ['order' => $order_create];
        $order_mail = Order::where('id', $orderId)->get();
        array_push($email,$request->email);
        foreach ($cart as $cart) {
            $cartDB = new Cart();
            $cartDB->order_id = $orderId;
            $cartDB->product_id = $cart['productID'];
            $cartDB->quantity = $cart['quantity'];
            $cart_create = $cartDB->save();
            $data += ['cart' => $cart_create];
            $qty =  Product::where('id', $cart['productID'])->pluck('quantity');
            $remaining = $qty[0] - $cart['quantity'];
            $update_qty =  Product::where('id', $cart['productID'])->update(array('quantity' => $remaining));
        }
        $order_detail = Cart::where('order_id',$orderId)->get();
        if (Mail::to($email)->send(new CheckoutMail($order_mail,$order_detail))) {
            $data += ['mail' => 1];
        } else {
            $data += ['mail' => 0];
        }
        session()->forget('cart');
        return $data;
    }
    public function Orders()
    {
       $orders = Order::get();
       return view('layouts.order.orders',compact('orders'));
    }
    public function Detail($id)
    {
       $order = Order::where('id',$id)->get();
       $details = Cart::where('order_id',$id)->get();
    
       return view('layouts.order.order-detail',compact('details', 'order'));
    }
}

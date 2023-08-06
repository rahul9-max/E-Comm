<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

class ProductController extends Controller
{
    //
    public function index(){
        // Retrieve all products from the products table using the all() method of the Product model
        $value = Product::all();
        // Pass the products to the 'product' view using an associative array
        return view('product', ['products' => $value]);
    }
    
    public function detail($id){
        // Retrieve the product with the given ID from the products table using the find() method of the Product model
        $value = Product::find($id);
        // Pass the product to the 'detail' view using an associative array
        return view('detail', ['products' => $value]);
    }
    
    public function addToCart(Request $request){
        // Check if user is logged in
        if($request->session()->has('user')){
            // If user is logged in, create a new Cart object
            $cart=new Cart;
            // Set the user ID of the cart to the ID of the logged in user
            $cart->user_id=$request->session()->get('user')['id'];
              // Set the product ID of the cart to the ID of the product being added, which is obtained from the $request object
            $cart->product_id=$request->productId;
            // Save the cart to the database
            $cart->save();
        }
        else{
            return redirect('login');
        }
    }
    static function cartItem(){
        // Get the user ID from the session data
        $userId = Session::get('user')['id'];
        // Count the number of items in the user's cart by querying the Cart model
        // for all rows where the user_id column matches the user ID retrieved from the session
        return Cart::where('user_id', $userId)->count();
    }
public function cartList(){
    $userId=Session::get('user')['id'];
    $products=DB::table('carts')
    ->join('products','carts.product_id','=','products.id')
    ->where('carts.user_id',$userId)
    ->select('products.*','carts.id as cart_id')
    ->get();

    return view('cartlist',['products'=>$products]);
}
// public function demo(){
//     return DB::table('employee')
//     ->join('company','company.employee_id','=','employee.id')
//     // ->select('employee.*')
//     ->where('company.name','google')
//     ->get();
    
// }
// public function example(Product $key){
//  return $key;
// }
public function removeCart($id){
     Cart::destroy($id);
     return redirect('cartlist');
}
public function orderNow(){
$userId=Session('user')['id'];
 $total=DB::table('carts')
->join('products','products.id','=','carts.product_id')
->where('carts.user_id',$userId)
->sum('products.price');

return view('ordernow',['total'=>$total]);
}

public function myOrders(){
    // $userId=Session::get('user')['id'];
    // $products=DB::table('orders')
    // ->join('products','orders.product_id','=','products.id')
    // ->where('orders.user_id',$userId)
    // ->get();
    $userId=Session::get('user')['id'];
    $orders= DB::table('orders')
     ->join('products','orders.product_id','=','products.id')
     ->where('orders.user_id',$userId)
     ->get();

     return view('myorders',['orders'=>$orders]);
}
public function orderPlace(Request $request){
    $userId=Session::get('user')['id'];
     $allCart=Cart::where('user_id',$userId)->get();
     foreach($allCart as $cart){
        $order=new Order;
        $order->product_id=$cart['product_id'];
        $order->user_id=$cart['user_id'];
        $order->status="pending";
        $order->payment_method=$request->input('payment','cash');// default value = 'cash'
        $order->payment_status="pending";
        $order->address=$request->address;
        $order->save();
        Cart::where('user_id',$userId)->delete();
     }
    $request->input();
    return redirect('/')->with('success','your order has been placed');
}
}

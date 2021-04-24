<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CarthelperController extends Controller
{
    private $cart;
    public function __construct(){
        if( session('cart') == null )
        {
            $this->cart = [];
        }else{
            $this->cart = session('cart');
        }
        $this->middleware(function($request,$next){
            view()->share([
                $this->cart = $this->cart
            ]);
            return $next($request);
        });
    }
    // function __construct() {
        // if( session('cart') == null )
        // {
        //     $this->cart = [];
        // }else{
        //     $this->cart = session('cart');
        // }
    // }
    public function index()
    {
        dd($this->cart);//hình như là có 2 view cart thì phải -.-// sao lại 2 những nào mà 2

        return view('frontend.pages.shop-cart');
    }
    public function add(Product $product){
        // session(['cart'=>[]]);
        // if(array_key_exists($product->id,$this->cart)){
            
        //     $this->cart[$product->id] =[
        //         'quantity' => $this->cart[$product->id]['quantity'] + 1
        //     ];
        // }else{
        //     $this->cart[$product->id] =[
        //         'product' => $product,
        //         'quantity' => 1
        //     ];
        // }
        if(isset($this->cart[$product->id])){
            $this->cart[$product->id]['quantity'] +=1;

        }else{
            $this -> cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product ->image,

            ];
        }

        session(['cart'=>$this->cart]);
        
    }

    public function update(Product $product){

    }

    public function delete($id){
        
    }

    public function remove(){
        
    }
    // public function save()
    // {
    //     session(['cart'=>$this->cart]);
    // }
}

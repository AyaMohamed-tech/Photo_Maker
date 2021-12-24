<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;
use App\Subscriber;

class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::get();
        return view('client.home')->with('sliders', $sliders);
    }
    public function about(){
        return view('client.about');
    }
    public function contact(){
        return view('client.contact');
    }
    public function gallery(){
        $categories = Category::get();
        return view('client.gallery')->with('categories', $categories);
    }
    public function category(){
        $categories = Category::get();
        $products = Product::where('status', '1')->get();
        return view('client.category')->with('products', $products)->with('categories', $categories);
    }
    public function services(){
        return view('client.services');
    }
    public function view_by_cat($name)
    {
        $categories = Category::get();
        $products = Product::where('product_category', $name)->get();
        return view('client.category')->with('products', $products)->with('categories', $categories);
    }
    
    public function subscribe(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:subscribers',
        ]);
        $subscribe = new Subscriber();
        $subscribe->email = $request->input('email');

        $subscribe->save();
        
        //return back()->with('status', trans('messages.Successfullysubscribed'));
        return back()->with('status', 'Successfully subscribed');
    }
}

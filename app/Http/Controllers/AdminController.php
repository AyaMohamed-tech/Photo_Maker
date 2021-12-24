<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use App\Category;
use App\Product;
use App\Subscriber;
use App\Contact;

class AdminController extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }

    //======================slider==========================

    public function sliders()
    {
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    public function addslider()
    {
        return view('admin.addslider');
    }
    public function saveslider(Request $request)
    {
        

        $this->validate($request, [
            'slider_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('slider_image')) {
            // 1 : get filename with Ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3 : get just extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            // 4 : file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // 5 : upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

         $slider = new Slider();

         $slider->slider_image = $fileNameToStore;
         $slider->status = 1;

         $slider->save();

        return redirect('/admin/addslider')->with('status', 'The Slider has been saved successfully');
    }

    public function edit_slider($id)
    {

        $slider = Slider::findOrFail($id);

        return view('admin.editslider')->with('slider', $slider);
    }

    public function updateslider(Request $request)
    {

        $this->validate($request, [
            'slider_image' => 'image|nullable|max:1999'
        ]);

        $slider = Slider::findOrFail($request->input('id'));

        if ($request->hasFile('slider_image')) {

            // 1 : get filename with Ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3 : get just extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            // 4 : file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // 5 : upload image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

            // $old_image = Product::findOrFail($request->input('id'));

            if ($slider->slider_image != 'noimage.jpg') {
                Storage::delete('public/slider_image/' . $slider->slider_image);
            }

            $slider->slider_image = $fileNameToStore;
        }
        $slider->update();
        return redirect('/admin/sliders')->with('status', 'The Slider has been updated successfully');
    }

    public function delete_slider($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->slider_image != 'noimage.jpg') {
            Storage::delete('public/slider_images/' . $slider->slider_image);
        }

        $slider->delete();

    
       return redirect('/admin/sliders')->with('status','The Slider has been deleted successfully');

       
    }

    public function unactivate_slider($id)
    {

        $slider = Slider::findOrFail($id);

        $slider->status = 0;

        $slider->update();

        return redirect('/admin/sliders')->with('status','The Slider status has been unactivated successfully');
       
        
    }
    public function activate_slider($id)
    {

        $slider = Slider::findOrFail($id);

        $slider->status = 1;

        $slider->update();

        return redirect('/admin/sliders')->with('status','The Slider status has been activated successfully');    
       
    }

    //======================category==========================
    public function categories()
    {
        $categories = Category::get();
        return view('admin.categories')->with('categories', $categories);
    }

    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function savecategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_image' => 'image|nullable|max:1999'
        ]);

        $checkcat = Category::where('category_name', $request->input('category_name'))->first();


        if (!$checkcat) {

            if ($request->hasFile('category_image')) {
                $fileNameWithExt = $request->file('category_image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('category_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $path = $request->file('category_image')->storeAs('public/category_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }

            $category = new Category();
            $category->category_name = $request->input('category_name');
            $category->category_image = $fileNameToStore;
            $category->save();

            return redirect('/admin/addcategory')->with('status', 'The ' . $category->category_name . ' Category has been saved successfully');
        } else {
            return redirect('/admin/addcategory')->with('status1', 'The ' . $request->input('category_name') . ' Category already exist');
        }
    }

    //===============edit category============

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editcategory')->with('category', $category);
    }

    public function updatecategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_image' => 'image|nullable|max:1999'
        ]);

        $category  = Category::findOrFail($request->input('id'));
        $old_cat = $category->category_name;
        $oldimage = $category->category_image;

        $category->category_name = $request->input('category_name');
        if ($request->hasFile('category_image')) {
            if ($request->hasFile('category_image')) {
                $fileNameWithExt = $request->file('category_image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('category_image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $path = $request->file('category_image')->storeAs('public/category_images', $fileNameToStore);
                // $oldimage = Product::findOrFail($request->input('id'));
                if ($oldimage != 'noimage.jpg') {
                    Storage::delete('public/category_images/' . $oldimage);
                }
                $category->category_image = $fileNameToStore;
            }
        }
        $data = array();
        $data['product_category'] = $request->input('category_name');

        DB::table('products')
            ->where('product_category', $old_cat)
            ->update($data);
        $category->update();
        return redirect('/admin/categories')->with('status', 'The ' . $category->category_name . ' Category has been updated successfully');
    }

    //================delete category=============

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->product_image != 'noimage.jpg') {
            Storage::delete('/public/category_images/' . $category->category_image);
        }
        $category->delete();

        return redirect('/admin/categories')->with('status', 'The ' . $category->category_name . ' Category has been deleted successfully');
    }

    //===========================gallery==================

    function addproduct()
    {
        $categories = Category::All()->pluck('category_name', 'category_name');
        return view('admin.addproduct')->with('categories', $categories);
    }

    public function saveproduct(Request $request)
    {

        $this->validate($request, [
            'product_image' => 'image|nullable|max:1999'
        ]);


        if ($request->input('product_category')) {

            if ($request->hasFile('product_image')) {
                // 1 : get filename with Ext
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

                // 2 : get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                // 3 : get just extension
                $extension = $request->file('product_image')->getClientOriginalExtension();

                // 4 : file name to store
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                // 5 : upload image
                $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }

            $product = new Product();
            $product->product_category = $request->input('product_category');
            $product->product_image = $fileNameToStore;
            $product->status = 1;

            $product->save();

            return redirect('admin/addproduct')->with('status', 'The ' . $product->product_name . ' Product has been saved successfully');
        } else {
            return redirect('admin/addproduct')->with('status1', 'Do select the category please');
        }
    }

    public function products()
    {
        $products = product::get();
        return view('admin.products')->with('products', $products);
    }

    public function editproduct($id)
    {
        $categories = Category::All()->pluck('category_name', 'category_name');
        $product = product::findOrFail($id);
        return view('admin.editproduct')->with('product', $product)->with('categories', $categories);
    }

    public function updateproduct(Request $request)
    {
        $this->validate($request, [
            'product_image' => 'image|nullable|max:1999',
        ]);

        $product = Product::findOrFail($request->input('id'));
        $product->product_category = $request->input('product_category');
        if ($request->hasFile('product_image')) {
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extention;
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
            $oldimage = Product::findOrFail($request->input('id'));
            if ($oldimage->product_image != 'noimage.jpg') {
                Storage::delete('public/product_images/' . $oldimage->product_image);
            }
            $product->product_image = $fileNameToStore;
        }
        $product->update();
        return redirect('/admin/products')->with('status', 'The ' . $request->input('product_name') . ' Product has been Updated Successfuly');
    }

    public function delete_product($id)
    {
        $product = Product::findOrFail($id);
        if ($product->product_image != 'noimage.jpg') {
            Storage::delete('/public/product_images/' . $product->product_image);
        }
        $product->delete();
        return redirect('/admin/products')->with('status', 'The ' . $product->product_name . ' Product has been Deleted Successfuly');
    }

    public function activate_product($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->update();
        return redirect('/admin/products')->with('status', 'The ' . $product->product_name . ' Product status has been Activated Successfuly');
    }

    public function unactivate_product($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->update();
        return redirect('/admin/products')->with('status', 'The ' . $product->product_name . ' Product status has been Unactivated Successfuly');
    }

    //==========================subscribers=========== 
    public function subscribers(){
        $subscribers = Subscriber::get();

        return view('admin.subscribers')->with('subscribers', $subscribers); 
    }
    public function delete_subscriber($id){

        $subscriber = Subscriber::findOrFail($id);

        $subscriber->delete();

        return redirect('/admin/subscribers')->with('status', 'The Subscriber has been deleted successfully');

    }

 //==========================clients===============
 public function clients(){
    $clients = Contact::get();

    return view('admin.clients')->with('clients', $clients); 
}
public function delete_client($id){

    $client = Contact::findOrFail($id);

    $client->delete();

    return redirect('/admin/clients')->with('status', 'The Client has been deleted successfully');

}

}

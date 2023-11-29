<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function ProductView()
    {
        if (session()->has('id') && session()->has('name')) { 
            $product=Product::all();
            return view('Product.ProductIndex',compact('product'));
        }
        else {
                  
            return redirect()->route('login');
        }
       
    }

    public function productStore(Request $request)
    {
        if (session()->has('id') && session()->has('name')) { 
            
            $request->validate(
                [
                   'name'=>'required',
                   'quantity'=>'required',
                   'price'=>'required',
                ],
                [
      
                ]
              );
      
              $product = Product::create([
                  'name' => $request->name,
                  'quantity' => $request->quantity,
                  'price' => $request->price,
              ]);
              
              $notification = [
                  'message' => 'Product Added Successfully',
                  'alert-type' => 'success'
              ];
               return redirect()->route('product.view')->with($notification);
        }
        else {
                  
            return redirect()->route('login');
        }
        
    }
    public function productEdit($id)
    {
        if (session()->has('id') && session()->has('name')) { 
            
            $product=Product::findOrfail($id);
            $data=Product::all();
            return view('Product.ProductEdit',compact('product','data'));
        }
        else {
                  
            return redirect()->route('login');
        }
        
    }
    public function productUpdate(Request $request)
    {
        if (session()->has('id') && session()->has('name')) { 
            
            $product=Product::where('id',$request->id)->first();
            $product->update([
                'name'=>$request->name,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                ]);
    
                $notification = [
                    'message' => 'Product updated Successfully',
                    'alert-type' => 'success'
                ];
                 return redirect()->back()->with($notification); 
        }
        else {
                  
            return redirect()->route('login');
        }
        

    }
    public function productDelete($id)
    {

        if (session()->has('id') && session()->has('name')) { 
            
            $product=Product::findOrfail($id);
            $product->delete();
            $notification = [
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'error'
            ];
             return redirect()->back()->with($notification); 
        }
        else {
                  
            return redirect()->route('login');
        }
        
    }
}

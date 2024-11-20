<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::get();
        $brands = Brand::active()->get();

        return  view('admin.products.index',compact('data','brands')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {

            $data['name'] = $request->name;
            $data['price'] = $request->price;
            $data['quantity'] = $request->quantity;
            $data['brand_id'] = $request->brand_id;
            $data['status'] = $request->status;


            if ($request->has('image')) {
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }

            Product::create($data);


            session()->flash('success','The data has been Created successfully');
            return redirect()->route('products.index');


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($request->product_id);
        try {
            //check the not exits
            if (empty($product)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            $data['name'] = $request->name;
            $data['price'] = $request->price;
            $data['quantity'] = $request->quantity;
            $data['brand_id'] = $request->brand_id;
            $data['status'] = $request->status;

            if ($request->has('image')) {
                $the_old_path = $product->getRawOriginal('image');
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }

            $product->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->route('products.index');


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            $product = Product::find($request->product_id);
            //check the not exits
            if (empty($product)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            if (file_exists('uploads/'.$product->getRawOriginal('image')) and !empty($product->getRawOriginal('image'))) {
                unlink('uploads/'.$product->getRawOriginal('image'));
            }
            $product->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->route('products.index');
        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } //
    }
}

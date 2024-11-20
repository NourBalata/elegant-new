<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::get();

        return  view('admin.brands.index',compact('data')) ;
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
    public function store(BrandRequest $request)
    {
        try {

            $data['name'] = $request->name;
            $data['status'] = $request->status;


            if ($request->has('image')) {
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }

            Brand::create($data);


            session()->flash('success','The data has been Created successfully');
            return redirect()->route('brands.index');


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
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($request->brand_id);
        try {
            //check the not exits
            if (empty($brand)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            $data['name'] = $request->name;
            $data['status'] = $request->status;


            if ($request->has('image')) {
                $the_old_path = $brand->getRawOriginal('image');
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }

            $brand->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->route('brands.index');


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

            $brand = Brand::find($request->brand_id);
            //check the not exits
            if (empty($brand)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            if (file_exists('uploads/'.$brand->getRawOriginal('image')) and !empty($brand->getRawOriginal('image'))) {
                unlink('uploads/'.$brand->getRawOriginal('image'));
            }
            $brand->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->route('brands.index');
        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } //
    }
}

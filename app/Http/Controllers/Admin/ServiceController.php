<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::get();
        $categories = Category::active()->get();
        return  view('admin.services.index',compact('data','categories')) ;
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
    public function store(ServiceRequest $request)
    {
        try {

            $data['name_ar'] = $request->name_ar;
            $data['name_en'] = $request->name_en;
            $data['status'] = $request->status;
            $data['category_id'] = $request->category_id;
            $data['description'] = $request->description;
            $data['price'] = $request->price;

            Service::create($data);


            session()->flash('success','The data has been Created successfully');
            return redirect()->route('services.index');


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
    public function update(ServiceRequest $request, $id)

    {
        $service = Service::find($request->service_id);

        try {
            //check the not exits
            if (empty($service)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            $data['name_ar'] = $request->name_ar;
            $data['name_en'] = $request->name_en;
            $data['status'] = $request->status;
            $data['category_id'] = $request->category_id;
            $data['description'] = $request->description;
            $data['price'] = $request->price;




            $service->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->route('services.index');


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

            $service = Service::find($request->service_id);
            //check the not exits
            if (empty($service)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }


            $service->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->route('services.index');

        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } //
    }
}

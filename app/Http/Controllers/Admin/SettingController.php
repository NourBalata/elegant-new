<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::first();

        return  view('admin.settings.index',compact('data')) ;
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
    public function store(SettingRequest $request)
    {

        try {

            $setting = Setting::first();

            //check the not exits
            if (empty($setting)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            $data['name_ar'] = $request->name_ar;
            $data['name_en'] = $request->name_en;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['telephone'] = $request->telephone;
            $data['tax_number'] = $request->tax_number;
            $data['address'] = $request->address;
            $data['address2'] = $request->address2;

            if ($request->has('logo')) {

                $the_old_path = $setting->logo;
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->logo);
                $data['logo'] = $the_file_path;

            }
            $setting->update($data);


            session()->flash('success','The data has been updated successfully');
            return redirect()->route('settings.index');


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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

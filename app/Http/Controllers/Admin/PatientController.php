<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::patient()->get();
        return  view('admin.patients.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::active()->get();
        return  view('admin.patients.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $request->validate([
            'email'=> 'required|email|unique:users,email',

        ]);
        try {

            $data['name_ar'] = $request->first_name;
            $data['name_en'] = $request->last_name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['date_of_birth'] = $request->date_brith;
            $data['gender'] = $request->gender;
            $data['status'] = $request->status;
            $data['address'] = $request->address;
            $data['city_id'] = $request->city_id;
            $data['id_number'] = $request->id_number;
            $data['type'] = 0; // is patient
            $data['password'] = bcrypt( $request->password);

            if ($request->has('logo')) {
                $the_file_path = uploadFile('uploads',$request->logo);
                $data['logo'] = $the_file_path;
            }

            User::create($data);


            session()->flash('success','The data has been Created successfully');
            return redirect()->route('patients.index');


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
        return  view('admin.patients.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
             $data = User::find($id);
            $cities = City::active()->get();

        return  view('admin.patients.edit',compact('data','cities'));

        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' =>'The Page Not Found']);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {

        $user = User::find($id);
        $request->validate([
            'email'=> 'required|email|unique:users,email,'.$user->id,

        ]);
        try{

            //check the not exits
            if (empty($user)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }


            $data['name_ar'] = $request->first_name;
            $data['name_en'] = $request->last_name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['date_of_birth'] = $request->date_brith;
            $data['gender'] = $request->gender;
            $data['status'] = $request->status;
            $data['address'] = $request->address;
            $data['city_id'] = $request->city_id;
            $data['id_number'] = $request->id_number;
            $data['type'] = 0; // is patient
            $data['password'] = bcrypt( $request->password);

            if ($request->has('logo')) {
                $the_old_path = $user->getRawOriginal('logo');
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->logo);
                $data['logo'] = $the_file_path;
            }

            $user->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->route('patients.index');


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

             $user = User::find($request->user_id);
            //check the not exits
            if (empty($user)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            if (file_exists('uploads/'.$user->getRawOriginal('logo')) and !empty($user->getRawOriginal('logo'))) {
                unlink('uploads/'.$user->getRawOriginal('logo'));
            }
            $user->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->route('patients.index');
        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } //

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('type',2)->get();

        return  view('admin.doctors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::active()->get();
        return  view('admin.doctors.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {


        $request->validate([
            'email'=> 'required|email|unique:users,email',

        ]);
        try {
            DB::beginTransaction();
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
            $data['balance'] = $request->balance;
            $data['commission'] = $request->commission;
            $data['type'] = 2; // is doctor
            $data['password'] = bcrypt($request->password);


            if ($request->has('logo')) {
                $the_file_path = uploadFile('uploads',$request->logo);
                $data['logo'] = $the_file_path;
            }
            if ($request->has('graduation_certificate')) {
                $the_file_path = uploadFile('uploads/graduation_certificate',$request->graduation_certificate);
                $data['graduation_certificate'] = $the_file_path;
            }
            if ($request->has('cv')) {
                $the_file_path = uploadFile('uploads/cv',$request->cv);
                $data['cv'] = $the_file_path;
            }

            $user = User::create($data);

            $work_time = [];

            for ($i = 0; $i < count($request->day); $i++) {


                $work_time [$i]['user_id'] = $user->id;
                $work_time [$i]['day'] = $request->day[$i];
                $work_time [$i]['start_from'] = $request->start_from[$i];
                $work_time [$i]['end_to'] = $request->end_to[$i];





            }
            $user->work_times()->createMany($work_time);
                DB::commit();

            session()->flash('success','The data has been Created successfully');
            return redirect()->route('doctors.index');


        } catch (\Exception $ex) {
                DB::rollBack();
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
        return  view('admin.doctors.show');
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

        return  view('admin.doctors.edit',compact('data','cities'));

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
    public function update(DoctorRequest $request, $id)
    {

        $request->validate([
            'email'=> 'required|email|unique:users,email,'.$id,

        ]);
        try {
            DB::beginTransaction();
            $user = User::find($id);
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
            $data['balance'] = $request->balance;
            $data['commission'] = $request->commission;
            $data['type'] = 2; // is doctor
            $data['password'] = bcrypt($request->password);


            if ($request->has('logo')) {
                $the_old_path = $user->getRawOriginal('logo');
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->logo);
                $data['logo'] = $the_file_path;
            }


            if ($request->has('graduation_certificate')) {
                $the_old_path = $user->graduation_certificate;
                if (file_exists('uploads/graduation_certificate/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/graduation_certificate/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads/graduation_certificate',$request->graduation_certificate);
                $data['graduation_certificate'] = $the_file_path;
            }

            if ($request->has('cv')) {
                $the_old_path = $user->cv;
                if (file_exists('uploads/cv/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/cv/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads/cv',$request->cv);
                $data['cv'] = $the_file_path;
            }


            $user->update($data);

            $work_time = [];

            for ($i = 1; $i <= count($request->day); $i++) {



                    $work_time [$i]['user_id'] = $user->id;
                    $work_time [$i]['day'] = $request->day[$i];
                    $work_time [$i]['start_from'] = $request->start_from[$i];
                    $work_time [$i]['end_to'] = $request->end_to[$i];




            }
            $user->work_times()->delete();
            $user->work_times()->createMany($work_time);
            DB::commit();

            session()->flash('success','The data has been Created successfully');
            return redirect()->route('doctors.index');


        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  remove_graduation_certificate(Request $request){

          $media = User::whereId($request->key)->first() ;

            if ( $media){
                if (File::exists('uploads/graduation_certificate/' . $media->graduation_certificate)) {

                    unlink('uploads/graduation_certificate/' . $media->graduation_certificate);
                }
                $media->graduation_certificate ='';
                $media->save();
                return true ;
            }

            return  false ;


    }

    public function  remove_cv(Request $request){

        $media = User::whereId($request->key)->first() ;

        if ( $media){
            if (File::exists('uploads/cv/' . $media->cv)) {

                unlink('uploads/cv/' . $media->cv);
            }
            $media->cv ='';
            $media->save();
            return true ;
        }

        return  false ;


    }
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
            if (file_exists('uploads/graduation_certificate/'.$user->getRawOriginal('graduation_certificate')) and !empty($user->getRawOriginal('graduation_certificate'))) {
                unlink('uploads/graduation_certificate/'.$user->getRawOriginal('graduation_certificate'));
            }
            if (file_exists('uploads/cv/'.$user->getRawOriginal('cv')) and !empty($user->getRawOriginal('cv'))) {
                unlink('uploads/cv/'.$user->getRawOriginal('cv'));
            }

            $user->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->route('doctors.index');
        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } //
    }
}

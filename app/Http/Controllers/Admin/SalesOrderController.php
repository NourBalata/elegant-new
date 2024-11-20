<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesOrderRequest;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetail;
use App\Models\Service;
use App\Models\Status;
use App\Models\User;
use App\Traits\PatientDataTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class SalesOrderController extends Controller
{
    use PatientDataTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SalesOrder::orderByDesc('id')->get();

        return  view('admin.sales_order.index',compact('data')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = User::doctor()->get();
        $patients = User::patient()->get();
        $services = Service::active()->get();
        return  view('admin.sales_order.create',compact('patients','services','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesOrderRequest $request)
    {

        try {
         DB::beginTransaction();

        $data['number'] = generateUniqueCode();
        $data['status_id'] =  $request->status_id;
        $data['patient_id'] =  $request->patient_id;
        $data['patient_name'] = $request->patient_name;
        $data['total'] = $request->total_all;
        $data['total_discounts'] = $request->discount_all;
        $data['final_total'] = $request->total_amount_all;
        $data['note'] = $request->note;
        $data['date'] = $request->date;
        $data['quantity'] = $request->quantity_all;
        $data['due_date'] = $request->due_date;

            if ($request->has('attachment')) {
                $the_file_path = uploadFile('uploads/attachment',$request->attachment);
                $data['attachment'] = $the_file_path;
            }

       $sales_order =  SalesOrder::create($data);

            $details = [];

            for ($i = 0; $i < count($request->service); $i++) {

                $details[$i]['sales_order_id'] = $sales_order->id;
                $details[$i]['services_id']  = $request->service[$i];
                $details[$i]['services_name']  =$request->service[$i];
                $details[$i]['category_name']  = $request->category[$i];
                $details[$i]['doctor']  = $request->doctor[$i];
                $details[$i]['quantity']  = $request->quantity[$i];
                $details[$i]['price']  = $request->price[$i];
                $details[$i]['amount']  = $request->amount[$i];
                $details[$i]['discount']  = $request->discount[$i];
                $details[$i]['price_discount']  = $request->amount_discount[$i];

            }

            DB::table('sales_order_details')->insert($details);


            DB::commit();

            session()->flash('success','The data has been Created successfully');
            return redirect()->route('sales_order.index');


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
        try {


            $data = SalesOrder::find($id);
            $doctors = User::doctor()->get();
            $patients = User::patient()->get();
            $services = Service::active()->get();

            return  view('admin.sales_order.show',compact('data','patients','services','doctors'));


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' =>'The Page Not Found']);

        }
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


            $data = SalesOrder::find($id);
            $doctors = User::doctor()->get();
            $patients = User::patient()->get();
            $services = Service::active()->get();

            return  view('admin.sales_order.edit',compact('data','patients','services','doctors'));


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
    public function update(SalesOrderRequest $request, $id)
    {

        try {
            DB::beginTransaction();

            $sales_order = SalesOrder::find($id);

            $data['status_id'] =  $request->status_id;
            $data['patient_id'] =  $sales_order->patient_id;
            $data['patient_name'] = $sales_order->patient_name;
            $data['total'] = $request->total_all;
            $data['total_discounts'] = $request->discount_all;
            $data['final_total'] = $request->total_amount_all;
            $data['note'] = $request->note;
            $data['date'] = $sales_order->date;
            $data['quantity'] = $request->quantity_all;
            $data['due_date'] = $request->due_date;

            if ($request->has('attachment')) {
                $the_file_path = uploadFile('uploads/attachment',$request->attachment);
                $data['attachment'] = $the_file_path;
            }

            $sales_order->update($data);

            $details = [];
            for ($i = 0; $i < count($request->service); $i++) {

                $details[$i]['sales_order_id'] = $sales_order->id;
                $details[$i]['services_id']  = $request->service[$i];
                $details[$i]['services_name']  =$request->service[$i];
                $details[$i]['category_name']  = $request->category[$i];
                $details[$i]['doctor']  = $request->doctor[$i];
                $details[$i]['quantity']  = $request->quantity[$i];
                $details[$i]['price']  = $request->price[$i];
                $details[$i]['amount']  = $request->amount[$i];
                $details[$i]['discount']  = $request->discount[$i];
                $details[$i]['price_discount']  = $request->amount_discount[$i];

            }

            $sales_order->sales_order_details()->delete();

            DB::table('sales_order_details')->insert($details);


            DB::commit();

            session()->flash('success','The data has been Updated successfully');
            return redirect()->route('sales_order.index');


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

    public function  remove_attachment(Request $request){

        $media = SalesOrder::whereId($request->key)->first() ;

        if ( $media){
            if (File::exists('uploads/attachment/' . $media->attachment)) {

                unlink('uploads/attachment/' . $media->attachment);
            }
            $media->attachment ='';
            $media->save();
            return true ;
        }

        return  false ;


    }

    public function  remove_service(Request $request){

        $service = SalesOrderDetail::where('id',$request->id)->first() ;

        if (isset($service)){
            $sales_order = SalesOrder::find($service->sales_order_id);
            $data['quantity'] = $sales_order->quantity - $service->quantity;
            $data['total'] = $sales_order->total - $service->amount;
            $data['total_discounts'] = $sales_order->total_discounts - $service->discount;
            $data['final_total'] = $sales_order->final_total - $service->price_discount;
            $sales_order->update($data);
            $service->delete();
            return  true;
        }else {
            return  false ;

        }




    }


    public function destroy($id)
    {
        //
    }
}

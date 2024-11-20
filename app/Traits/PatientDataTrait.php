<?php

namespace App\Traits;

use App\Models\Service;
use App\Models\User;

trait PatientDataTrait
{

    function get_patient_data($id){

        $data = User::find($id);
        $city = $data->city->name;

        return response()->json([$data,$city]);

    }

    function get_service_data($id){

        $data = Service::find($id);
        $category =$data->category->name;


        return response()->json([$data,$category]);

    }

}

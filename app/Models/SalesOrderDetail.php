<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function sales_order(){

        return $this->belongsTo(SalesOrder::class);
    }

    public function doctor_d(){

        return $this->belongsTo(User::class,'doctor');
    }




    public function service(){

        return $this->belongsTo(Service::class,'services_id');
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}

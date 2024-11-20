<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $table ='sales_orders';
    protected $guarded =[];


    public function patient(){

        return $this->belongsTo(User::class,'patient_id');
    }

    public function status(){

        return $this->belongsTo(Status::class,'status_id');
    }

    public function sales_order_details(){

        return $this->hasMany(SalesOrderDetail::class);
    }
}

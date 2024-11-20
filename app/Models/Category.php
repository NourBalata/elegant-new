<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getImageAttribute($value)
    {
        return asset('uploads/'.$value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function status()
    {
        return $this->status ==1 ?'Active':'Disable';
    }

    public function services(){

        return $this->hasMany(Service::class);
    }

}

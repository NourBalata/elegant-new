<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function type(): Attribute
    {
//        0=>patient, 1=>Admin, 2=>Doctor ,3=>employ , 4=>supplier
        return new Attribute(
            get: fn ($value) =>  ["patient", "admin","supplier"][$value],
        );
    }
    public function getLogoAttribute($value)
    {
        return asset('uploads/'.$value);
    }
    public function scopePatient($query)
    {
        return $query->where('type', 0);
    }
    public function scopeDoctor($query)
    {
        return $query->where('type', 2);
    }

    public function scopeSupplier($query)
    {
        return $query->where('type', 2);
    }



    public  function city(){

        return $this->belongsTo(City::class,);
    }
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value)
        );
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function status()
    {
        return $this->status ==1 ?'Active':'Disable';
    }

    public function work_times()
    {
        return $this->hasMany(EmployeeWork::class);
    }


}

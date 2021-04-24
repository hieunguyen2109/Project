<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';

    protected $fillable = ['name','email','phone','password','role','address','status'];

    public function orders(){
        return $this->hasOne(Order::class,'account_id','id');
    }

    public function blogs(){
        return $this->hasMany(Blog::class,'account_id','id');
    }

    public function scopeSearch($query)
    {
        if($search = request()->search){
            $query = $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['name','email','phone','address','note','status','account_id'];

    public function details(){
        return $this->hasOne(Orderdetails::class,'order_id','id');
    }

    public function accounts(){
        return $this->hasMany(Account::class,'id','id');
    }

    public function scopeSearch($query)
    {
        if($search = request()->search){
            $query = $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }  

    public function account()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }
}

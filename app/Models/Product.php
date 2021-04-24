<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name','image','image_list','price','sale_price','description','status','category_id'];

    public function cat(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function details(){
        return $this->hasMany(Orderdetails::class,'product_id','id');
    }

    public function pro_details(){
        return $this->hasMany(Productdetails::class,'productdetails_id','id');
    }

    public function scopeSearch($query)
    {
        if($search = request()->search){
            $query = $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }

}

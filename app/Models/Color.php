<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';

    protected $fillable = ['name','status'];

    public function pro_details(){
        return $this->hasMany(Productdetails::class,'color_id','id');
    }

    public function scopeSearch($query)
    {
        if($search = request()->search){
            $query = $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }
}

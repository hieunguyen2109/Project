<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productdetails extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = ['productdetails_id','color_id','size_id'];

    public function colors(){
        return $this->hasOne(Color::class,'color_id','id');
    }

    public function sizes(){
        return $this->hasOne(Size::class,'size_id','id');
    }
}

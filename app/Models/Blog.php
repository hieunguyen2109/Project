<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = ['name','image','description','sumary','status','account_id'];

    public function account(){
        return $this->hasOne(Account::class,'id','account_id');
    }

    public function scopeSearch($query)
    {
        if($search = request()->search){
            $query = $query->where('name','like','%'.$search.'%');
        }
        return $query;
    }

    public function accounts()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }
}

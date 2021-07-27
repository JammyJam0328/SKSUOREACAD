<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function campus(){
        return $this->belongsToMany(Campus::class,'campus_documents')->withPivot('status','id');
    }


    public function request()
    {
            return $this->belongsToMany(Request::class,'request_documents')->withPivot('number_of_page','id','total_amount','isAuth','copies');
    }
}
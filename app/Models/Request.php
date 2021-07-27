<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function information()
    {
        return $this->belongsTo(Information::class);
    }
    public function documents()
    {
        return $this->belongsToMany(Document::class,'request_documents')->withPivot('number_of_page','id','total_amount','isAuth','copies');
    }
    public function purpose(){
        return $this->belongsTo(Purpose::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }

}
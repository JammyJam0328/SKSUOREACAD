<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasMany(User::class);
    }
    
    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function documents(){
        return $this->belongsToMany(Document::class,'campus_documents')->withPivot('status','id');
    }
}

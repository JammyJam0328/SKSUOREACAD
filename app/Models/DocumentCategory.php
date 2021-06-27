<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;
    public function campus(){
        return $this->belongsToMany(Campus::class,'campus_documents');
    }

    public function document(){
        return $this->hasMany(Document::class);
    }
}

<?php

namespace App\Http\Livewire\Registrar;
use Illuminate\Support\Facades\Route;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;

class Printpdf extends Component
{
    public $requests=[];
    public $status;
    public $year;
    public $month;

    public function render()
    {
        
        $this->requests=Request::where('campus_id',auth()->user()->campus_id)
                        ->where('status','like','%'.$this->status.'%')
                        ->whereYear('created_at',$this->year)
                        ->whereMonth('created_at',$this->month)->get();
        return view('livewire.registrar.printpdf');
        dd($this->requests);
    }

    public function mount($status,$year,$month){
 
        if($status=="All"){
            $this->status="";
        }else{
            $this->status=$status;
        }
      
       $this->year=$year;
       $this->month=$month;

    }
  
  
}
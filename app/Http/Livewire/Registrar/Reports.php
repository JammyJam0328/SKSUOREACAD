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
class Reports extends Component
{
    public $status="";
    public $month;
    public $startDate;
    public $endDate;

    public $years=[];
  
    public $monthStart=1;

    public function render()
    {
        return view('livewire.registrar.reports',[
            'requests'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','like','%'.$this->status.'%')
                    ->whereBetween('created_at', [$this->startDate, $this->endDate])->get()     
        ]);
    }
    public function mount(){

        // $yearRange = 10;
        // $this->yearSelect = date('Y');
        // $this->monthSelect = date('m');
        
    }
    public function printPDF()
    {
        if($this->status==""){
            $this->status="All";
        }
        return redirect()->route('registrar-printPDF',[
            'status'=>$this->status,
            'startDate'=>$this->startDate,
            'endDate'=>$this->endDate,
        ]);
    }
}
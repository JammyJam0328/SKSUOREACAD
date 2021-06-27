<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\ModelsDocument;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;

class Dashboard extends Component
{
    public $search="";
    public $requestors=[];
    public $countPending;
    public $countUnread;
    public $countToReview;


    public $mycampus;
    public function render()
    {
        $this->mycampus=auth()->user()->campus_id;
        if($this->search){
            $this->requestors=Information::where('lastname','like','%'.$this->search.'%')->orWhere('studentnumber','like','%'.$this->search.'%')
            ->whereHas('requests', function (Builder $query) {
                $query->where('campus_id', $this->mycampus);
            })->get();
           
        }
        $this->countPending=Request::where('status','Pending')->where('campus_id',$this->mycampus)
                            ->count();
        $this->countToReview=Request::where('status','Payment Review')->where('campus_id',$this->mycampus)
                            ->whereHas('information', function (Builder $query) {
                                $query->where('status', 'Ongoing')->orWhere('status','Not Graduated');
                            })->count();

          $this->countUnread=Request::where('read','no')->where('campus_id',$this->mycampus)
                            ->whereHas('information', function (Builder $query) {
                                $query->where('status', 'Ongoing')->orWhere('status','Not Graduated');
                            })->count();
  
        return view('livewire.registrar.dashboard',[
            'requests'=>Request::where('campus_id',$this->mycampus)->where('status','Pending')->orderBy('created_at','DESC')->get()
        ]);
    }

}

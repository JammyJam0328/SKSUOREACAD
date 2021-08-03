<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Purpose;
use App\Models\Request as RequestModel;
use Illuminate\Database\Eloquent\Builder;
class ViewRequestor extends Component
{
    public $requestor_id;
    public $requestDetail;

    public $sideDetails=false;
    public function render()
    {
        return view('livewire.registrar.view-requestor',[
            'requestor'=>Information::where('id',$this->requestor_id)->first()
        ]);
    }
    public function mount($id)
    {
        $this->requestor_id=$id;
    }
    public function viewDetails($id)
    {
        
        $this->requestDetail=RequestModel::where('id',$id)->first();
        $this->sideDetails=true;
    }
}
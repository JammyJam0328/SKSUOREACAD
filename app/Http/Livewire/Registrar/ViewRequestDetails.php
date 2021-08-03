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
use Illuminate\Support\Facades\Route;
class ViewRequestDetails extends Component
{

  
    public function render()
    {
        $this->request=Request::where('id',$this->request_id)->first();
        $this->total_amount=$this->request->documents()->sum('total_amount');
        return view('livewire.registrar.view-request-details');
    }
}
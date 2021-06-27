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
class Graduuated extends Component
{
    public function render()
    {
        return view('livewire.registrar.graduuated',[
            'requests'=>Request::where('status','Cleared')->where('campus_id',auth()->user()->campus_id)->orderBy('created_at','DESC')->get()
        ]);
    }
}

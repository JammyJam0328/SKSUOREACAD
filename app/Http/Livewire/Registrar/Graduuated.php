<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder;
class Graduuated extends Component
{

      protected function getListeners()
    {
        return [
            "echo-private:new-request.".auth()->user()->campus_id.",NewRequest" => 'notify'
        ];
    }
    public function notify()
    {
        $this->emit('notify');
    }
    public function render()
    {
        return view('livewire.registrar.graduuated',[
            'requests'=>Request::where('status','Cleared')->where('campus_id',auth()->user()->campus_id)->orderBy('created_at','DESC')->get()
        ]);
    }
}
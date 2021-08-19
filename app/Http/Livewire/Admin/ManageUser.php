<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
class ManageUser extends Component
{
    use WithPagination;

    public $search;
    public $defaultPassword="sksuoroad123";
    public $user_id;
    public $resetModal=false;
    public function render()
    {
        
        return view('livewire.admin.manage-user',[
            'users'=>User::where('email','like','%'.$this->search.'%')->paginate(10)
        ]);
    }

    public function resetPassword($user_id)
    {
        $this->user_id=$user_id;
        $this->resetModal=true;
    }

    public function confirmResetPassword()
    {
        $userAccount = User::where('id',$this->user_id)->first();
        $userAccount->update([
            'password'=>hash::make($this->defaultPassword),
        ]);
        $this->user_id='';
        $this->resetModal=false;
        $this->alert('success','Password has been reset');
    }
}
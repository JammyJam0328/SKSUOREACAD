<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\RequestorEvent;
use App\Models\User;
use App\Models\Information;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Notification;

class UserNotification extends Component
{

    public $isOpen=false;
    public $readNotifs=[];
    public $unreads=[];
    public $unreadCount=0;
    protected function getListeners()
    {

        return [
            "echo-private:requestor.".auth()->user()->id.",RequestorEvent" => '$refresh'
        ];
    }
    public function render()
    {
        $this->unreadCount = Notification::where('read','no')->where('user_id',auth()->user()->id)->count();
        $this->readNotifs =Notification::where('read','yes')->where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();

        return view('livewire.user-notification',[
            'unreadNotifs'=>Notification::where('read','no')->where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get()
        ]);
    }
    public function closeNotif()
    {

        $this->isOpen=false;
        Notification::where('user_id',auth()->user()->id)->where('read','no')
                    ->update([
                        'read'=>'yes',
                    ]);
        

    }
    

  
 
}
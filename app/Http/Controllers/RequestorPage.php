<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

use Illuminate\Support\Facades\Route;
use App\Models\Request as RequestModel;
class RequestorPage extends Controller
{
    public function dashboard()
    {
        return view('pages.requestor.dashboard');
    }
    public function request()
    {
        return view('pages.requestor.request');
    }
    public function updateinformation()
    {
        return view('pages.requestor.update-information');
    }

    public function information()
    {
        if(auth()->user()->information){
            return view('pages.requestor.myinformation');
        }else{
            return redirect()->route('requestor-request');
        }
    }

    public function viewrequest($id)
    {
      
        $request=RequestModel::where('id',$id)->first();
        if($request->information->id==auth()->user()->information->id){
            return view('pages.requestor.view-request-details',[
                'id'=>$id
            ]);
        }else{
            abort(403);
        }
        
    }

    public function finalize($id)
    {
        return view('pages.requestor.finalize',[
            'id'=>$id
        ]);
    }

  


   


}
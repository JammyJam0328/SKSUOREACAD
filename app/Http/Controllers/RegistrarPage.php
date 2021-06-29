<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
class RegistrarPage extends Controller
{
    public function dashboard()
    {
        return view('pages.registrar.dashboard');
    }
    public function request()
    {
        return view('pages.registrar.request');
    }

    public function document()
    {
        return view('pages.registrar.document');
    }
    public function requestdetails($id)
    {
        if($id==null){
            return back();
        }else{
            $myrequest=RequestModel::where('id',$id)->first();
            if($myrequest){
                return view('pages.registrar.requestdetails',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        }
    }

    public function graduatedDetails($id)
    {
        if($id==null){
            return back();
        }else{
            $myrequest=RequestModel::where('id',$id)->first();
            if($myrequest){
                return view('pages.registrar.graduate-request-details',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        }
    }

    public function graduated()
    {
        return view('pages.registrar.graduate-request');
    }

    public function viewRequest($id)
    {
        return view('pages.registrar.view-request',[
            'id'=>$id
        ]);
    }

    public function viewrequestor($id)
    {
        return view('pages.registrar.view-requestor',[
            'id'=>$id
        ]);
    }
    // public function payment()
    // {
    //     return view('pages.registrar.payment-info');
    // }
}
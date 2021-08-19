<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as RequestModel;
class RegistrarPage extends Controller
{
    public $pageName="";
    public function dashboard()
    {
        $this->pageName="Dashboard";
        return view('pages.registrar.dashboard');
        
    }
    public function request()
    {
        $this->pageName="All Request";

        return view('pages.registrar.request');
    }

    public function document()
    {
        $this->pageName="Document";

        return view('pages.registrar.document');
    }
    public function requestdetails($id)
    {
        $this->pageName="RequestDetails";
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
       
            $requestor=User::where('id',$id)->first();
            if($requestor){
                return view('pages.registrar.view-requestor',[
                    'id'=>$id
                ]);
            }else{
                abort(403);
            }
        

      
    }
    public function reports()
    {
        return view('pages.registrar.reports');
    }
    public function printPDF($status,$startDate,$endDate)
    {
        
        return view('pages.registrar.pdfreport',[
            'status'=>$status,
            'startDate'=>$startDate,
            'endDate'=>$endDate,
        ]);
    }
}
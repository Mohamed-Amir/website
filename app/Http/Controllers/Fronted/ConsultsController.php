<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Consults;
use App\Http\Controllers\Manage\EmailsController;

class ConsultsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function requestConsults(){
        return view('Fronted.Consults.consults');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendConsults(Request $request){
        $Consults=Consults::where('email',$request->email)->first();
        if(!is_null($Consults)){
            $msg= 'البريد مسجل لدينا بالفعل';
            return response()->json(['status'=>0,'message'=>$msg]);
        }
        $Consults = new Consults();
        $Consults->name=$request->name;
        $Consults->phone=$request->phone;
        $Consults->email=$request->email;
        $Consults->topic=$request->topic;
        $Consults->save();
        $msg= 'شكرا لك,سيتم التواصل معكم في اقرب وقت ممكن';
        return response()->json(['status'=>1,'message'=>$msg]);
    }

}

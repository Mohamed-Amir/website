<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Contact_form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Contact_us;
use App\Http\Controllers\Manage\EmailsController;

class Contact_usController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact_us(){
        return view('Fronted.Contact_us.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function form(Request $request){
        $massage = new Contact_form();
        $massage->name=$request->name;
        $massage->phone=$request->phone;
        $massage->email=$request->email;
        $massage->topic=$request->topic;
        $massage->save();
        $msg= 'شكرا لك,سيتم التواصل معكم في اقرب وقت ممكن';
        return response()->json(['status'=>1,'message'=>$msg]);
    }
}

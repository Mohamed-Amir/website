<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Reposatries\UserReposatry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Manage\EmailsController;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sign_in  (){
        $current=4;
        return view('Fronted.User.signin',compact('current'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logged(Request $request)
    {
        $userdata = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // attempt to do the login
        if (Auth::attempt($userdata))
        {
            $msg=getLang() =='ar' ? 'تم تسجيل الدخول بنجاح' : 'log in success';
            return response()->json(['status'=>1,'message'=>$msg]);

        }
        else
        {
           $msg=getLang() =='ar' ? 'البيانات المدخلة غير صحيحية' : 'invalid email or password';
            return response()->json(['status'=>0,'message'=>$msg]);
        }
    }


public function myProfile()
{
    return view('Fronted.User.my_profile');
}
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sign_up  (){
        $current=5;
        return view('Fronted.User.signup',compact('current'));
    }


    /**
     * @param Request $request
     * @param UserReposatry $reposatry
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function register (Request $request,UserReposatry $reposatry){
        $validate_user=$reposatry->validate_user($request,0);
        if(isset($validate_user)){
            return $validate_user;
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return response()->json(['status'=>1,'message'=>'تم تسجيل حسابك نجاح']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile (){
        $current=6;
        return view('Fronted.User.profile',compact('current'));
    }

    public function logout (){
        Auth::logout();
        return redirect('/');

    }


}

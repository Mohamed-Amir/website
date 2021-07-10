<?php

namespace App\Reposatries;

use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Validator,Auth,Artisan,Hash,File,Crypt;

class UserReposatry  {
    use \App\Traits\ApiResponseTrait;

    /**
     * @param $request
     * @return User|mixed
     */
    public function register($request)
    {
        $lang = $request->header('lang');
        $user = new User();
        $user->firstName = $request->firstName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->lastName = $request->lastName;
        $user->status  = 0;
        $user->social  = $request->social;
        $user->username  = $request->username;
        if($request->social ==1)
            $user->socialKey  = $request->socialKey;
        $user->active_code  = 12345;
        $user->lang=$lang;
        if($request->socail != 1)
            $user->password = Hash::make($request->password);
        if($request->image)
            $user->image=saveImage('users',$request->file('image'));
        $user->save();
        $token = $user->createToken('TutsForWeb')->accessToken;
        $user['user_token']=$token;
        // send_email_with_code($user,1,'verification_email');
        return $user;
    }

    /***
     * @param $request
     * @param $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function validate_user($request, $user_id)
    {
        $input = $request->all();
        $validationMessages = [
            'name.required' =>   'من فضلك ادخل الاسم'  ,
            'password.required' =>  'من فضلك ادخل كلمة السر'   ,
            'email.required' =>  'من فضلك ادخل البريد الالكتروني' ,
            'email.unique' =>  'هذا البريد الالكتروني موجود لدينا بالفعل'  ,
            'username.unique' =>  'اسم المستخدم موجود لدينا بالفعل'  ,
            'email.regex'=>'من فضلك ادخل بريد الكتروني صالح' ,
            'phone.required' =>  'من فضلك ادخل  رقم الهاتف' ,
            'phone.unique' =>  'رقم الهاتف موجود لدينا بالفعل'  ,
            'phone.min' =>   'رقم الهاتف يجب ان لا يقل عن 7 ارقام'  ,
            'phone.numeric' =>   'رقم الهاتف يجب ان يكون رقما' ,
        ];

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => $user_id ==0 ? 'required|unique:users' : 'required|unique:users,phone,'.$user_id,
            'email' => $user_id ==0 ? 'required|unique:users|regex:/(.+)@(.+)\.(.+)/i' : 'required|unique:users,email,'.$user_id.'|regex:/(.+)@(.+)\.(.+)/i',
            'password' => $user_id != 0 || $request->social  ? '' : 'required' ,
        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 2500);
        }
    }



}

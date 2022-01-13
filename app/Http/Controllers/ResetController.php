<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function resetPassword(){
        $this->validate(request(),[
            'email'=>'required',
            'name'=>'required'
        ]);
        $user =  User::where('email',request('email'))->first();
        if(!empty($user)){
            if($user->name === request('name')){
                $user->update(['password'=> bcrypt("12345678")]);
                return redirect('/login')->with('status',"Password Reset,Your new password is : 123456");
            }else{
                return redirect()->back()->withErrors(['name'=>'Secret Not Matched']);
            }
        }else{
            return redirect()->back()->withErrors(['email'=>'User Not Found']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProducts;
use ReCaptcha\ReCaptcha;
use Validator;
use App\User;
use Hash;

class AdminController extends Controller
{
	public function captchaCheck($response)
    {

        //$response = $req->input('g-recaptcha-response');

        $remoteip = $_SERVER['REMOTE_ADDR']; //192.168.0.0
        $secret   = env('RE_CAP_SECRET'); //6LcuZzIUAAAAACEYzMomFwEjM_arJ3S1uHcpVMOM

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

	public function getRegister(){
		return view('register');
	}

	public function postRegister(Request $req){
		$data = $req->all();

		$response = $req->input('g-recaptcha-response');

		$data['captcha'] = $this->captchaCheck($response);

		$validator = Validator::make($data,[
			'fullname' => 'required|min:10|max:50',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6|max:20',
			're_password' => 'required|same:password',
			'g-recaptcha-response'  => 'required',
            'captcha'               => 'required|min:1'
		],
		[
			'fullname.required' => 'Họ tên không rỗng',
			'fullname.min' => 'Tên ít nhất 10 kí tự',
			'email.unique' => 'Email đã có người sử dụng',
			're_password.same' =>'Mật khẩu không giống nhau',
			'g-recaptcha-response.required' => 'Vui lòng check ReCaptcha',
			'captcha.required' => 'Vui lòng check captcha',
            'captcha.min' => 'Captcha không chính xác, vui lòng thử lại.'
		]);
		if ($validator->fails()) {
            return redirect()->route('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('home');
		
	}


    public function getIndex(){

    	$type = TypeProducts::all();
    	return view('pages.index',compact('type'));
    	//return view('pages.index',['type'=>$type]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class checkUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $user = User::where('email',$request->email)->first();
        if($user && $user->active==1){
            return $next($request);
        }
        elseif(!$user){
            return redirect()->back()->with('loi',"Email chưa đăng kí");
        }
        else{
            return redirect()->back()->with('loi',"Tài khoản chưa được active. Vui lòng liên hệ quản trị viên");
        }
    }
}

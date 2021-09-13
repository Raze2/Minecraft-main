<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\TwoFactorCodeNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('frontend.login');
    }

    function doLogin(Request $request)
    {
        $request->validate([ 
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $user = DB::connection('players')->select('select uniqueId,lastNickname,hashedPassword  from user_profiles where lastNickname = ?', [$request->username]);
        if(isset($user[0])) {
            $salt = substr($user[0]->hashedPassword, 7,32);
            $hash = hash('sha256', (hash('sha256', $request->password) . $salt));
		    $password = 'SHA256$' . $salt . '$' . $hash;
            if($user[0]->hashedPassword == $password) {
                $login_user = User::firstOrNew([
                    'uuid' => $user[0]->uniqueId,
                    'player' => 1
                ]);
                $login_user->username = $user[0]->lastNickname;
                $login_user->save();
                Auth::loginUsingId($login_user->id, $request->remember);
                return redirect()->intended('/');
            } else if ($user[0]->hashedPassword == null) {
                return redirect()->back()->with('message','Please Type /createpassword IN THE SERVER!');
            } else {
                return redirect()->back()->with('message','Credentials not matced in our records!');
            }
        } else {
            return redirect()->back()->with('message','Credentials not matced in our records!');
        }

    }

}

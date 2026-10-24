<?php

namespace App\Http\Controllers;

use App\Models\Tab;
use App\Models\Pengguna;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Auth;
use \FPDF;


class DashboardController extends Controller
{
    private $username;
    private $password;
    public function index(){
        $this->username = session()->get('username');
        $this->password = session()->get('password');
        $user = $this->username;
        $pass = $this->password;
        $menus = Tab::get();
        return view('dashboard',compact('menus', 'user', 'pass'));
    }

    public function actionloging(Request $request){
        $site = $request->menuname;
        $url = $request->url;
        $users = Password::where(['site' => $site,'nrp' => session()->get('username')])->get();
        $usered = "";
        $pass = "";
        foreach ($users as $user) {
            $usered = $user->username;
            $pass = $user->password;
        }
        $arguments = array(
            'username' => $usered,
            'password' => $pass
        );
        return Redirect::away($url)->with(['username' => $usered, 'password' => $pass]);
    }
    
    public function actionlogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}







